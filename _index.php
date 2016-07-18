<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
  <link type="text/css" rel="stylesheet" href="app/includes/style.css">
  <!-- Section include -->
  <script src="app/includes/jquery-3.0.0.min.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="/semantic/dist/semantic.min.css"> -->
  <script src="/semantic/dist/semantic.min.js"></script>
  <!-- lightslider -->
  <link type="text/css" rel="stylesheet" href="app/includes/lightslider/dist/css/lightslider.css" />
  <script src="app/includes/lightslider/dist/js/lightslider.js"></script>
  <!-- lightGallery -->
  <link type="text/css" rel="stylesheet" href="app/includes/lightGallery/dist/css/lightGallery.css" />
  <script src="app/includes/lightGallery/dist/js/lightGallery.js"></script>
  <!-- responsiveslides  -->
  <script src="app/includes/ResponsiveSlides.js/responsiveslides.min.js"></script>

  <title> VV PHOTOGRAPHY </title>

</head>
  <body>
    <div class="ui grid container">
      <div class="row">
        <div class="column"><img src="app/img/header.svg"></div>
      </div>

      <!-- <div class="doubling nine column row border-head"> -->
      <div class="ui nine column row doubling stackable grid container txt-nav bar-font border-head">
        <div class="column">news</div>
        <div class="column"><a href="?page=men">men</a></div>
        <div class="column"><a href="?page=still">still</a></div>
        <div class="column"><a href="?page=women">women</a></div>
        <div class="column"><a href="?page=portrait">portrait</a></div>
        <div class="column"><a href="?page=personal">personal</a></div>
        <div class="column"><a href="?page=etc">etc</a></div>
        <div class="column">bio</div>
        <div class="column">contact</div>
      </div>
      <div class="row">
        <div class="column">
          <?php 
          switch(isset($_GET['page']) ? $_GET['page'] : ''){

            case 'men' : require_once('app/http/page_men.php');
              break;

            case 'still' : require_once('app/http/page_still.php');
              break;

            case 'women' : require_once('app/http/page_women.php');
              break;

            case 'portrait' : require_once('app/http/page_portrait.php');
              break;

            case 'personal' : require_once('app/http/page_personal.php');
              break;

            case 'etc' : require_once('app/http/page_etc.php');
              break;

            default:
              // require_once('app/http/ResponsiveSlides.php');
              require_once('app/http/page_still.php');
          }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
