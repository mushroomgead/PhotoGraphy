<?php
if ((!isset($_SESSION)) ? session_start() : '');

require_once('app/database/conn_db.php');
require_once('app/database/function.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    require_once('library.php');
    require_once('default.js');
    if(isset($_SESSION['UserData']['username'])){ ?>
       <nav class="navbar-default">
          <div class="container-fluid">
           <div class="navbar-header">
             <a class="navbar-brand" href="index.php"><?php echo $_SESSION['UserData']['username']; ?></a></div>
               <ul class="nav navbar-nav pull-left">
                  <li class="pull-left"><a href="admin/adminupload.php">Upload</a></li>
                  <li class="pull-left"><a href="admin/logout.php">Logout</a></li>
               </ul>
           </div>
       </nav>
    <?php } ?>

  <div class="clearfix container font-style" id="page_index">
      <div class="clearfix section-header" id="section-header">
        <title> PHOTOGRAPHER </title>
        <ul class="clearfix font-size-body layout-right topnav" id="myTopnav">
            <li class="nav-column-logo pull-left font-size-header ">VV PHOTOGRAPHER</li>
            <li class="clearfix nav-column pull-left"><a href="#" id="#" >news</a></li>
            <li class="clearfix nav-column pull-left"><a href="?page=men" id="men">men</a></li>
            <li class="clearfix nav-column pull-left"><a href="?page=still" id="still">still</a></li>
            <li class="clearfix nav-column pull-left"><a href="?page=women" id="women">women</a></li>
            <li class="clearfix nav-column pull-left"><a href="?page=portrait" id="portrait">portrait</a></li>
            <li class="clearfix nav-column pull-left"><a href="?page=personal" id="personal">personal</a></li>
            <li class="clearfix nav-column pull-left"><a href="?page=etc" id="etc">etc</a></li>
            <li class="clearfix nav-column pull-left"><a href="#" id="bio">bio</a></li>
            <li class="clearfix icon">
              <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()" id="icon-hambg">☰</a>
            </li>
        </ul>
      </div>
    </head>

    <body>
      <div class="clearfix section-body font-size-body">
          <?php
          switch(isset($_GET['page']) ? $_GET['page'] : '')
          {
            case 'men'      : require_once('app/http/page_men.php');
              break;

            case 'still'    : require_once('app/http/page_still.php');
              break;

            case 'women'    : require_once('app/http/page_women.php');
              break;

            case 'portrait' : require_once('app/http/page_portrait.php');
              break;

            case 'personal' : require_once('app/http/page_personal.php');
              break;

            case 'etc'      : require_once('app/http/page_etc.php');
              break;

            default:
              require_once('app/http/page_home.php');
          }
          ?>
      </div>
    </body>
    <?php require_once('footer.php'); ?>
  </div>
</html>
