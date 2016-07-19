<!DOCTYPE html>
<html>
  <div class="clearfix container font-style">
  <head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link type="text/css" rel="stylesheet" href="../app/includes/style.css">
    <!-- Section include -->
    <script src="../app/includes/jquery-3.0.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../app/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="../app/includes/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="../app/includes/lightslider/dist/css/lightslider.css" />
    <script src="../app/includes/lightslider/dist/js/lightslider.js"></script>

    <!-- lightGallery -->
    <link type="text/css" rel="stylesheet" href="../app/includes/lightGallery/dist/css/lightGallery.css" />
    <script src="../app/includes/lightGallery/dist/js/lightGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="../app/includes/lightGallery/dist/js/lg-thumbnail.min.js"></script>
    <script src="../app/includes/lightGallery/dist/js/lg-fullscreen.min.js"></script>

    <script src="../app/includes/script.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

      $('#aniimated-thumbnials').lightGallery({
          thumbnail:true,
          download:false,
          showThumbByDefault: false
      }); 
    });

    </script>
    </head>

    <body>
      <div class="clearfix section-body">
          <?php 
          switch(isset($_GET['page']) ? $_GET['page'] : ''){

            default:
              require_once('../app/http/login.php');
          }
          ?>
      </div>
    </body>

  </div>
</html>
