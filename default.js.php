<script type='text/javascript'>
    $(document).ready(function() {
        // window.load
        $(window).load(function(){
            $('#loader').delay(50).fadeOut(150);
        });
        // scroll to top.
        $(window).scroll(function(){
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

            event.preventDefault()
            // remove clicked element
            $grid.masonry( 'remove', this )
            // layout remaining item elements
            .masonry('layout');

        })

        <?php } ?>
        //waiting for loading photo.
        $(window).on('load',function() {
            $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 200
            });
        });

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