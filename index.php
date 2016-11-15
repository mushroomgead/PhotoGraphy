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
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- lightslider -->
    <link type="text/css" rel="stylesheet" href="css/lightslider.min.css" />
    <script src="js/lightslider.min.js"></script>
    <!-- lightgallery -->
    <link type="text/css" rel="stylesheet" href="css/lightgallery.min.css" />
    <script src="js/lightGallery.min.js"></script>
    <script src="js/lg-thumbnail.min.js"></script>
    <script src="js/lg-fullscreen.min.js"></script>
    <!-- perfectLayout -->
    <script src="js/perfectLayout.min.js"></script>
    <!-- masonry -->
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('a#<?php echo isset($_GET['page'])? $_GET['page'] : '99'; ?>').addClass("active-page");
        });
    </script>
    <?php
        require_once('app/database/conn_db.php');
        require_once('app/database/function.php');
    ?>
    </head>
    <body>
        <!-- BackToTop Button -->
        <a id="goTop"><i class="fa fa-chevron-up"></i></a>

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
                <?php include('src/header.php'); ?>
                <main>
                    <div class="clearfix section-body font-size-body" id="page_index">        
                        <div id="loader">
                            <div class="cssload-spinner"></div>
                        </div>
                        <?php
                            switch(isset($_GET['page']) ? $_GET['page'] : '') {
                                case 'men'      :
                                    require_once('src/page_men.php');
                                    break;

                                case 'still'    :
                                    require_once('src/page_still.php');
                                    break;

                                case 'women'    :
                                    require_once('src/page_women.php');
                                    break;

                                case 'portrait' :
                                    require_once('src/page_portrait.php');
                                    break;

                                case 'personal' :
                                    require_once('src/page_personal.php');
                                    break;

                                case 'adminupload':
                                    require_once('admin/adminupload.php');
                                    break;

                                default:
                                require_once('src/page_home.php');
                            }
                        ?>
                    </div>
                </main>
            <?php require_once('src/footer.php'); ?>
        </div>
    </body>
</html>
