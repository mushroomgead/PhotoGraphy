<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> PHOTOGRAPHER </title>
    <meta name="description" content="Showing Photos of VV PHOTOGRAPHER" />
    <meta name="keywords" content="vv photographer,photography,vv,photographer" />
    <meta name="author" content="mushroomgead" />
    <link rel="icon" type="image/png" href="favicon.png" />
    <link type="text/css" rel="stylesheet" href="app/includes/style.css">

    <!-- Section include -->
    <script src="app/includes/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="app/includes/responsive.css">
    <!-- <link rel="stylesheet" href="app/includes/font-awesome-4.6.3/css/font-awesome.min.css"> -->
    <script src="https://use.fontawesome.com/a3968c3586.js"></script>
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightslider/dist/css/lightslider.css" />
    <script src="app/includes/lightslider/dist/js/lightslider.js"></script>
    <!-- lightGallery -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightGallery/dist/css/lightgallery.min.css" />
    <script src="app/includes/lightGallery/dist/js/lightGallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="app/includes/lightGallery/dist/js/lg-thumbnail.min.js"></script>
    <script src="app/includes/lightGallery/dist/js/lg-fullscreen.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
    <?php 
        require_once('app/database/conn_db.php');
        require_once('app/database/function.php');

        if ((!isset($_SESSION)) ? session_start() : ''); 
        
        require_once('default.js.php'); 
    ?>
    </head>
    <body>
        <div id="loader">
            <div class="cssload-spinner"></div>
        </div>
        <?php if(isset($_SESSION['UserData']['username'])){ ?>
            <nav class="navbar-default">
                <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="index.php"><?php echo $_SESSION['UserData']['username']; ?></a></div>
                    <ul class="nav navbar-nav pull-left">
                        <li class="pull-left"><a href="admin/adminupload.php">Upload</a></li>
                        <li class="pull-left"><a href="admin/logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
        <main>
            <div class="clearfix container font-style font-size-body">
                <nav class="clearfix section-header" id="section-header">
                    <ul class="clearfix font-size-body layout-right topnav" id="myTopnav">
                        <li class="pull-left font-size-header">
                            <a href="./">VV PHOTOGRAPHER</a>
                        </li>
                        <li class="clearfix nav-column pull-right">
                            <a href="?page=etc" id="etc">etc</a>
                        </li>
                        <li class="clearfix nav-column pull-right">
                            <a href="?page=personal" id="personal">personal</a>
                        </li>
                        <li class="clearfix nav-column pull-right">
                            <a href="?page=portrait" id="portrait">portrait</a>
                        </li>
                        <li class="clearfix nav-column pull-right">
                            <a href="?page=women" id="women">women</a>
                        </li>
                        <li class="clearfix nav-column pull-right">
                            <a href="?page=still" id="still">still</a>
                        </li>
                        <li class="clearfix nav-column pull-right">
                            <a href="?page=men" id="men">men</a>
                        </li>
                        <li class="clearfix icon">
                            <a href="javascript:void(0);" style="font-size:15px;" onclick="HambergerMenu()" id="icon-hambg">☰</a>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix section-body font-size-body" id="page_index">
                    <?php
                        switch(isset($_GET['page']) ? $_GET['page'] : '') {
                            case 'men'      : 
                                require_once('app/http/page_men.php'); 
                                break;

                            case 'still'    : 
                                require_once('app/http/page_still.php');
                                break;

                            case 'women'    : 
                                require_once('app/http/page_women.php');
                                break;

                            case 'portrait' : 
                                require_once('app/http/page_portrait.php');
                                break;

                            case 'personal' : 
                                require_once('app/http/page_personal.php');
                                break;

                            case 'etc'      : 
                                require_once('app/http/page_etc.php');
                                break;

                            default:
                            require_once('app/http/page_home.php');
                        }
                    ?>
                </div>
            </div>
        </main>
        <?php require_once('footer.php'); ?>
    </body>
</html>
