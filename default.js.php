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
        $('#aniimated-thumbnials').lightGallery({
          thumbnail:true,
          download:false,
          showThumbByDefault: false
        });

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
        });
    });

    // Sticky
    $(window).scroll(function() {
      if ($(this).scrollTop() > 30){
        $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').addClass("sticky");

      }
      else{
        $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').removeClass("sticky");
      }
    });

    function HambergerMenu() {
        if($('#myTopnav').hasClass('responsive')){
          $("#myTopnav").removeClass("responsive");
        }else{
          $("#myTopnav").addClass("responsive");
        }

    }
</script>