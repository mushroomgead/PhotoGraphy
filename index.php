<?php //require_once('app/database/conn_db.php'); ?>
<!DOCTYPE html>
<html>
  <div class="clearfix font-style">
  <head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link type="text/css" rel="stylesheet" href="app/includes/style.css">
    <link type="text/css" rel="stylesheet" href="app/includes/responsive.css">
    <!-- Section include -->
    <script src="app/includes/jquery-3.0.0.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="/semantic/dist/semantic.min.css"> -->
    <!-- <script src="/semantic/dist/semantic.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="app/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="app/includes/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightslider/dist/css/lightslider.css" />
    <script src="app/includes/lightslider/dist/js/lightslider.js"></script>

    <!-- lightGallery -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightGallery/dist/css/lightGallery.css" />
    <script src="app/includes/lightGallery/dist/js/lightGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="app/includes/lightGallery/dist/js/lg-thumbnail.min.js"></script>
    <script src="app/includes/lightGallery/dist/js/lg-fullscreen.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    //   var img_height1 = $("#1").height();
    //   var img_width1  = $("#1").width();

    //   var img_height2 = $("#2").height();
    //   var img_width2  = $("#2").width();

    //   console.log(img_height1);
    //   console.log(img_width1);
    //   console.log(img_height2);
    //   console.log(img_width2);

      $('#aniimated-thumbnials').lightGallery({
          thumbnail:true,
          download:false,
          showThumbByDefault: false
      });
    });

    $(window).scroll(function() {
      // console.log($(this).scrollTop());
    if ($(this).scrollTop() > 1){  
        $('#section-header,.layout-left,.layout-right,.font-size-header').addClass("sticky");
      }
      else{
        $('#section-header,.layout-left,.layout-right,.font-size-header').removeClass("sticky");
      }
    });

    // document.onmousedown=disableclick;
    // function disableclick(event)
    // {
    //   if(event.button==2)
    //    {
    //      return false;
    //    }
    // }
    </script>

    <!-- responsiveslides  -->
    <!-- <script src="app/includes/ResponsiveSlides.js/responsiveslides.min.js"></script> -->

      <div class="clearfix section-header" id="section-header">
        <title> VV PHOTOGRAPHER </title>
        <!-- <a href="?page=index"> -->
        <div class="clearifx font-size-header layout-left">
        <!-- <img src="app/img/header.svg"> -->
          VV PHOTOGRAPHER
        </div>
        <!-- </a> -->

        <div class="clearfix font-size-body layout-right">
          <div class="nav-column pull-left">news</div>
          <a href="?page=men"><div class="nav-column pull-left">men</div></a>
          <a href="?page=still"><div class="nav-column pull-left">still</div></a>
          <a href="?page=women"><div class="nav-column pull-left">women</div></a>
          <a href="?page=portrait"><div class="nav-column pull-left">portrait</div></a>
          <a href="?page=personal"><div class="nav-column pull-left">personal</div></a>
          <a href="?page=etc"><div class="nav-column pull-left">etc</div></a>
          <div class="nav-column pull-left">bio</div>
          <div class="nav-column pull-left">contact</div>
        </div>
      </div>
    </head>

    <body>
      <div class="clearfix section-body container font-size-body">
          <?php
          switch(isset($_GET['page']) ? $_GET['page'] : ''){

            case 'men' : require_once('app/http/page_men_main.php');
              break;

            case 'still' : require_once('app/http/page_still.php');
              break;

            case 'women' : require_once('app/http/page_women_main.php');
              break;

            case 'portrait' : require_once('app/http/page_portrait.php');
              break;

            case 'personal' : require_once('app/http/page_personal.php');
              break;

            case 'etc' : require_once('app/http/page_etc.php');
              break;

            default:
              require_once('app/http/page_home.php');
          }
          ?>
      </div>
    </body>
    <!-- footer  -->
    <div class="clearfix section-footer">
      <div class="section-left">COPYRIGHT 2015 BY VV PHOTOGRAPHER</div>
      <div class="section-right">
        <div class="pull-left"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter&nbsp;|&nbsp;</div>
        <div class="pull-left"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;Facebook&nbsp;|&nbsp;</div>
        <div class="pull-left"><i class="fa fa-flickr" aria-hidden="true"></i>&nbsp;Flickr&nbsp;|&nbsp;</div>
        <div class="pull-left"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;e-mail@hotmail.com</div>
      </div>
    </div>
    <!--  -->
  </div>
</html>
