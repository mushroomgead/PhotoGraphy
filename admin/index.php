<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> PHOTOGRAPHER </title>
    <meta name="description" content="Showing Photos of VV PHOTOGRAPHER" />
    <meta name="keywords" content="vv photographer,photography,vv,photographer" />
    <meta name="author" content="mushroomgead" />
    <link rel="icon" type="image/png" href="favicon.png" />
    <link type="text/css" rel="stylesheet" href="../app/includes/style.css">

    <!-- Section include -->
    <script src="../app/includes/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link type="text/css" rel="stylesheet" href="../app/includes/responsive.css">
    <script src="https://use.fontawesome.com/a3968c3586.js"></script>
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="../app/includes/lightslider/dist/css/lightslider.css" />
    <script src="../app/includes/lightslider/dist/js/lightslider.js"></script>
    <!-- lightGallery -->
    <link type="text/css" rel="stylesheet" href="../app/includes/lightGallery/dist/css/lightgallery.min.css" />
    <script src="../app/includes/lightGallery/dist/js/lightGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="../app/includes/lightGallery/dist/js/lg-thumbnail.min.js"></script>
    <script src="../app/includes/lightGallery/dist/js/lg-fullscreen.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
    </head>
    <body>
      <div class="clearfix container font-style">
      <?php
      session_start();
      if (isset($_SESSION['UserData']['username'])) {
          header('location:../index.php');
      } else {
          require_once 'login.php';
      }?>
      </div>
    </body>
</html>
