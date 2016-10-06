<script type='text/javascript'>
  $(document).ready(function() {

    $('a#<?php echo isset($_GET['page'])? $_GET['page'] : '99'; ?>').addClass("active-page");
    $('#aniimated-thumbnials').lightGallery({
        thumbnail:true,
        download:false,
        showThumbByDefault: false
    });

  });
  function myFunction() {
    if($('#myTopnav').hasClass('responsive')){
      $("#myTopnav").removeClass("responsive");
    }else{
      $("#myTopnav").addClass("responsive");
    }
  }
</script>