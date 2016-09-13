<!DOCTYPE html>
<html>
  <div class="clearfix container font-style">
  <head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link type="text/css" rel="stylesheet" href="../app/includes/style.css">
    <!-- Section include -->
    <script src="../app/includes/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../app/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="../app/includes/font-awesome-4.6.3/css/font-awesome.min.css">
    <script src="../app/includes/script.js"></script>
    </head>
    <body>
      <?php session_start();
      if(isset($_SESSION['UserData']['username'])){ ?>
        <div class="clearfix section-body">
        Login success
        <a href="adminupload.php">
          <div class="clearfix block-index">
            UPLOAD
          </div>
        </a>

        <a href="../index.php">
          <div class="clearfix block-index">
           GO TO HOME PAGE
          </div>
        </a>

        <a href="logout.php">
          <div class="clearfix block-index">
          Click to Logout
          </div>
        </a>
      <?php } else {
        require_once('login.php');
        } ?>
      </div>
    </body>

  </div>
</html>
