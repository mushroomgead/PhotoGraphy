<script type='text/javascript'>

    $(document).ready(function() {
        $('#imageGallery').lightSlider({
            item:1,
            loop:true,
            slideMove:1,
            slideMargin:5,
            pager: false,
            pauseOnHover: true,
            auto: true,
            speed: 400,
            pause: 5000
          });

        $(window).scroll(function() {
            if($(this).scrollTop() > 200){
                $('#goTop').stop().animate({
                    bottom: '60px'
                    }, 100);
            }
            else{
                $('#goTop').stop().animate({
                   bottom: '-100px'
                }, 100);
            }
        });
        $('#goTop').click(function() {
            $('html, body').stop().animate({
               scrollTop: 0
            }, 100, function() {
               $('#goTop').stop().animate({
                   bottom: '-100px'  
               }, 100);
            });
        });

        $('html').addClass('fix-scroll');
        //Page active
        $('a#<?php echo isset($_GET['page'])? $_GET['page'] : '99'; ?>').addClass("active-page");

        var $grid = $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 200
        });
        <?php
        if (isset($_SESSION['UserData']['username'])) {
        ?>

        $grid.on('click','.grid-item',function(event){
            if (confirm('Delete ?')){
                event.preventDefault();

                $.ajax({
                    url  : 'app/database/ajaxcenter.php',
                    type :'POST',
                    data : {
                        case     : 'deletePhoto',
                        filepath : $('#filepath').val(),
                        category : $('#category').val(),
                        filename : $('#filename').val()
                    },
                    success: function(result){
                        console.log(result);
                    },
                    error: function(result){
                        alert('Error!!!!!!!!!!!!!!');
                    }
                });
                // remove clicked element
                $grid.masonry( 'remove', this )
                // layout remaining item elements
                .masonry('layout');
            }
        })

        <?php } ?>
        //waiting for loading photo.
        $(window).on('load',function() {
            $('#loader').delay(50).fadeOut(150);

            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 280
            });

            $("html").removeClass('fix-scroll');
            
            // $('#aniimated-thumbnials').lightGallery({
            //   thumbnail:true,
            //   download:false,
            //   showThumbByDefault: false
            // });            


        });
    });

    // Sticky
    // $(window).scroll(function() {
    //   if ($(this).scrollTop() > 30){
    //     $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').addClass("sticky");

    //   }
    //   else{
    //     $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').removeClass("sticky");
    //   }
    // });

    function HambergerMenu() {
        if($('#myTopnav').hasClass('responsive')){
          $("#myTopnav").removeClass("responsive");
        }else{
          $("#myTopnav").addClass("responsive");
        }

    }
    function GetImageFromDB(category, subcategory){

    $.ajax({
        url  : 'app/database/ajaxcenter.php',
        type :'POST',
        data:{
            case          : 'GenImage',
            p_category    : category,
            p_subcategory : subcategory
        },
        success:function(result){
            console.log(result);
            var photos = JSON.parse(result);

            $.fn.perfectLayout = function (photos) {
              var node = this;
              var perfectRows = perfectLayout(photos, $(this).width(), $(window).height(), { margin: 2 });
              node.empty();
              perfectRows.forEach(function (row) {
                  row.forEach(function (img) {
                      var imgNode = $('<a href="'+ img.src +'"><div class="image"><img src="'+img.data+'" style="display:none;"></img></div></a>');
                      imgNode.children('.image').css({
                          'width': img.width + 'px',
                          'height': img.height + 'px',
                          'background': 'url(' + img.data + ')',
                          'background-size': 'cover'
                      });
                      node.append(imgNode);
                  });
              });
            };

            var gallery = $('#gallery');
            gallery.perfectLayout(photos);

            $(window).resize(function () {
                gallery.perfectLayout(photos);
            });
            
            $(window).trigger('resize');

            gallery.lightGallery({
                thumbnail:true,
                download:false,
                showThumbByDefault: false
            });
        },
        error:function(text,err){
            alert(text.responseText);
        }
    });
}

    function GetCoverImageFromDB(category,flgmark){

    $.ajax({
        url  : 'app/database/ajaxcenter.php',
        type :'POST',
        data:{
            case          : 'GenCoverImage',
            p_flgmark     : flgmark,
            p_category    : category
        },
        success:function(result){
            var photos = JSON.parse(result);

            $.fn.perfectLayout = function (photos) {
              var node = this;
              var perfectRows = perfectLayout(photos, $(this).width(), $(window).height(), { margin: 2 });
              node.empty();
              perfectRows.forEach(function (row) {
                  row.forEach(function (img) {
                      var imgNode = $('<a href="'+ img.data +'"><div class="image"></div></a>');
                      imgNode.children('.image').css({
                          'width': img.width + 'px',
                          'height': img.height + 'px',
                          'background': 'url(' + img.src + ')',
                          'background-size': 'cover'
                      });
                      node.append(imgNode);
                  });
              });
            };

            var gallery = $('#gallery');
            gallery.perfectLayout(photos);

            $(window).resize(function () {
                gallery.perfectLayout(photos);
            });
            
            $(window).trigger('resize');

        },
        error:function(text,err){
            alert(text.responseText);
        }
    });
}
</script>