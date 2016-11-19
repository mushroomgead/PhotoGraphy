<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title> PHOTOGRAPHER </title>
    <meta name="description" content="Showing Photos of VV PHOTOGRAPHER" />
    <meta name="keywords" content="vv photographer,photography,vv,photographer" />
    <meta name="author" content="mushroomgead" />
    <link rel="icon" type="image/png" href="favicon.png" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">    
    <!--  -->
    </head>
    <body>
        <div class="clearfix container font-style">
            <?php
                require_once('../database/conn_db.php');
                if (isset($_SESSION['UserData']['username'])) {
                  header('location:../index.php');
                } else {
                  require_once 'login.php';
                }
            ?>
        </div>
    </body>
</html>
