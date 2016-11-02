<script type='text/javascript'>

    $(document).ready(function() {
        // $('html body').animate({ scrollTop: 0}, 600);

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
                    // case: 'deletePhoto',
                    data: {
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
        });
    });

        // scroll to top.
        $(document).scroll(function(){
            if($(this).scrollTop() > 100){
            $('#scroll').fadeIn();
            }else{
            $('#scroll').fadeOut();
            }
        });
        // click for scroll to top page.
        $('#scroll').click(function(){
            $('html body').animate({ scrollTop: 0}, 600);
            return false;
        });

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

        //test use shorthand
        // if($('#myTopnav').hasClass('responsive')) ? $("#myTopnav").removeClass("responsive") : $("#myTopnav").addClass("responsive");

    }
</script>