<script type='text/javascript'>

    $(document).ready(function() {
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
                columnWidth: 200
            });

            $("html").removeClass('fix-scroll');

            $grid.imagesLoaded().progress(function(){
                $grid.masonry('layout');
            });
        });
    });

        // scroll to top.
        // $(document).scroll(function(){
        //     if($(this).scrollTop() > 100){
        //     $('#scroll').fadeIn();
        //     }else{
        //     $('#scroll').fadeOut();
        //     }
        // });
        // click for scroll to top page.
        // $('#scroll').click(function(){
        //     $('html body').animate({ scrollTop: 0}, 600);
        //     return false;
        // });

        // $(document).on('click','#scroll',function(){
        //     alert('555555');
        // });

    // Sticky
    // $(window).scroll(function() {
    //   if ($(this).scrollTop() > 1){
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
</script>