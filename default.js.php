<script type='text/javascript'>
  $(window).load(function(){
    $('#loader').delay(500).fadeOut(150);
  })
  $(document).ready(function() {

    $('a#<?php echo isset($_GET['page'])? $_GET['page'] : '99'; ?>').addClass("active-page");
    $('#aniimated-thumbnials').lightGallery({
        thumbnail:true,
        download:false,
        showThumbByDefault: false
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
  
  function myFunction() {
    if($('#myTopnav').hasClass('responsive')){
      $("#myTopnav").removeClass("responsive");
    }else{
      $("#myTopnav").addClass("responsive");
    }
  }
</script>