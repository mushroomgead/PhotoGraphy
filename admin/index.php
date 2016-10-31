<!DOCTYPE html>
<html>
    <head>
      <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
      <link type="text/css" rel="stylesheet" href="../app/includes/style.css">
      <script src="../app/includes/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../app/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <script src="https://use.fontawesome.com/a3968c3586.js"></script>
      <script src="../app/includes/script.js"></script>
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
