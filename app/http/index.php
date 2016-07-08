<!-- Section include -->
<link rel="icon" href="../../favicon.ico" type="image/x-icon"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../semantic/dist/semantic.min.css">
<script src="../../semantic/dist/semantic.min.js"></script>
<!-- lightslider -->
<link type="text/css" rel="stylesheet" href="../includes/lightslider/dist/css/lightslider.css" />
<script src="../includes/lightslider/dist/js/lightslider.js"></script>
<!-- lightGallery -->
<link type="text/css" rel="stylesheet" href="../includes/lightGallery/dist/css/lightGallery.css" />
<script src="../includes/lightGallery/dist/js/lightGallery.js"></script>
<!-- responsiveslides  -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../includes/ResponsiveSlides.js/responsiveslides.min.js"></script>


<?php require_once('../includes/style.css'); ?>
<!--  test -->
<?php //require_once('category.php'); ?>
<!--  -->
<title> VV PHOTOGRAPHY </title>
<div class="ui grid container">
  <div class="row border-head">
    <div class="column">HEADER</div>
  </div>
  <div class="doubling nine column row border-head">
    <div class="column">news</div>
    <div class="column">men</div>
    <div class="column">still</div>
    <div class="column">women</div>
    <div class="column">portrait</div>
    <div class="column">personal</div>
    <div class="column">etc</div>
    <div class="column">bio</div>
    <div class="column">contact</div>
  </div>
  <div class="row border-head">
    <div class="column">
      <?php require_once('ResponsiveSlides.php'); ?>
    </div>
  </div>
</div>
