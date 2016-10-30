<script type='text/javascript'>
  $(window).load(function(){
    $('#loader').delay(50).fadeOut(150);
  });
  
  $(document).ready(function() {
      

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

<?php
}
?>
    $(window).on('load',function() {

      $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: 200
      });
    });
  });

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