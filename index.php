<!-- test git -->
<?php //require_once('app/database/conn_db.php'); ?>
<?php echo "Hello"?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="app/includes/style.css">
    <!-- Section include -->
    <script src="app/includes/jquery.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="/semantic/dist/semantic.min.css"> -->
    <!-- <script src="/semantic/dist/semantic.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="app/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <script src="app/includes/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="app/includes/responsive.css">
    <link rel="stylesheet" href="app/includes/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightslider/dist/css/lightslider.css" />
    <script src="app/includes/lightslider/dist/js/lightslider.js"></script>

    <!-- lightGallery -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightGallery/dist/css/lightgallery.min.css" />
    <script src="app/includes/lightGallery/dist/js/lightGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="app/includes/lightGallery/dist/js/lg-thumbnail.min.js"></script>
    <script src="app/includes/lightGallery/dist/js/lg-fullscreen.min.js"></script>

  <div class="clearfix container font-style" id="page_index">
    <script type="text/javascript">

    function getMenuResp(){
      $('#MenuTopNav').addClass('menutop-nav');
      // $('#page_index').addClass('index-nav');
      // $('#section-body').addClass('body-nav');
      // document.body.style.backgroundColor = 'rgba(0,0,0,0.4)';
    }

    function closeMenuResp(){
      alert('close');
    }

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
//         $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').addClass("sticky");
    // console.log($(this).width());
    // > 480
    $(window).scroll(function() {
      if ($(this).scrollTop() > 1){
        // if($(this).width() > 360){
                  // $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').addClass("sticky");
        // }

        }
        else{
          $('#section-header,.layout-left,.layout-right,.font-size-header,.nav-column').removeClass("sticky");
        }
    });
    document.onmousedown=disableclick;
    function disableclick(event)
    {
      if(event.button==2)
       {
         return false;
       }
    }
    </script>
      <div class="clearfix section-header" id="section-header">
        <title> VV PHOTOGRAPHER </title>
        <div class="clearifx font-size-header layout-left">
          VV PHOTOGRAPHER
        </div>

        <ul class="clearfix font-size-body layout-right topnav" id="MenuTopNav">
            <li class="icon nav-column pull-left nav-menu"><a href="javascript:void(0);" onclick="getMenuResp()">ICON MENU</a></li>
            <li class="icon nav-column pull-left"><a href="javascript:void(0);" onclick="closeMenuResp()">X</a></li>
            <li class="nav-column pull-left"><a href="#">news</a></li>
            <li class="nav-column pull-left"><a href="?page=men">men</a></li>
            <li class="nav-column pull-left"><a href="?page=still">still</a></li>
            <li class="nav-column pull-left"><a href="?page=women">women</a></li>
            <li class="nav-column pull-left"><a href="?page=portrait">portrait</a></li>
            <li class="nav-column pull-left"><a href="?page=personal">personal</a></li>
            <li class="nav-column pull-left"><a href="?page=etc">etc</a></li>
            <li class="nav-column pull-left"><a href="#">bio</a></li>
            <li class="nav-column pull-left"><a href="#">contact</a></li>
        </ul>
      </div>


    </head>

    <body>
      <div class="clearfix section-body font-size-body">
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
        <div class="pull-left nav-footer"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;Twitter&nbsp;|&nbsp;</div>
        <div class="pull-left nav-footer"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;Facebook&nbsp;|&nbsp;</div>
        <div class="pull-left nav-footer"><i class="fa fa-flickr" aria-hidden="true"></i>&nbsp;Flickr&nbsp;|&nbsp;</div>
        <div class="pull-left nav-footer"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;e-mail@hotmail.com</div>
      </div>
    </div>
    <!--  -->
  </div>
</html>
