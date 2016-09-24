<script type="text/javascript">
  $(document).ready(function() {
    $('#aniimated-thumbnials').lightGallery({
        thumbnail:true,
        download:false,
        showThumbByDefault: false
    });
  });

  function myFunction() {
    var x = document.getElementById('myTopnav');
    if (x.className === 'topnav'){
        x.className += ' responsive';
    } else {
      x.className = 'topnav';
    }
  }
</script>