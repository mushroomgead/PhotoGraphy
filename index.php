<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title> PHOTOGRAPHER </title>
    <meta name="description" content="Showing Photos of VV PHOTOGRAPHER" />
    <meta name="keywords" content="vv photographer,photography,vv,photographer" />
    <meta name="author" content="mushroomgead" />
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="stylesheet" href="app/includes/style.css">
    <!-- Section include -->
    <script src="app/includes/jquery.min.js"></script>
    <link rel="stylesheet" href="app/includes/responsive.css">
    <link rel="stylesheet" href="app/includes/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/includes/bootstrap-3.3.7-dist/css/bootstrap.css">
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightslider/dist/css/lightslider.css" />
    <script src="app/includes/lightslider/dist/js/lightslider.js"></script>
    <!-- lightgallery -->
    <link type="text/css" rel="stylesheet" href="app/includes/lightgallery/dist/css/lightgallery.min.css" />
    <script src="app/includes/lightgallery/dist/js/lightGallery.min.js"></script>
    <script src="app/includes/lightgallery/dist/js/lg-thumbnail.min.js"></script>
    <script src="app/includes/lightgallery/dist/js/lg-fullscreen.min.js"></script>
    <!-- masonry -->
    <script src="app/includes/masonry.pkgd.min.js"></script>
    <!-- perfectLayout -->
    <script src="app/includes/perfect-layout/dist/perfectLayout.min.js"></script>
    <?php
        require_once('app/database/conn_db.php');
        require_once('app/database/function.php');
        require_once('default.js.php');
    ?>
    </head>
    <body>
        <!-- BackToTop Button -->
        <a id="goTop"><i class="fa fa-chevron-up"></i></a>
        <!-- End of BackToTop Button -->
        <?php if(isset($_SESSION['UserData']['username'])){ ?>
            <nav class="navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php"><?php echo $_SESSION['UserData']['username']; ?></a>
                    </div>
                    <ul class="nav navbar-nav pull-left">
                        <li class="pull-left">
                            <a href="?page=adminupload" id="adminupload">Upload</a>
                        </li>
                        <li class="pull-left">
                            <a href="admin/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
            <div class="clearfix font-style font-size-body">
                <?php include('header.php'); ?>
                <main>
                    <div class="clearfix section-body font-size-body" id="page_index">        
                        <div id="loader">
                            <div class="cssload-spinner"></div>
                        </div>
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

                                case 'adminupload':
                                    require_once('admin/adminupload.php');
                                    break;

                                default:
                                require_once('app/http/page_home.php');
                            }
                        ?>
                    </div>
                </main>
            <?php require_once('footer.php'); ?>
        </div>
    </body>
</html>
