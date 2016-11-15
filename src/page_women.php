<!-- <?php
$category = 'women';
$flgmark  = 'cover';

if(isset($_GET['subpage'])){
  $subcategory = $_GET['subpage']; ?>
  <div id='gallery'></div>
  <script type='text/javascript'>
    $(document).ready(function () {
      GetImageFromDB('WOMEN',<?php echo "'".$subcategory."'"; ?>);
    });
  </script>

<?}else{ 
  GenCoverPhoto($category,$flgmark);
}
?> -->

<?php
$category = 'women';
$flgmark  = 'cover';

if(isset($_GET['subpage'])){
  $subcategory = $_GET['subpage']; ?>
  <div id='gallery'></div>
  <script type='text/javascript'>
    $(document).ready(function () {
      GetImageFromDB('WOMEN',<?php echo "'".$subcategory."'"; ?>);
    });
  </script>

<?}else{ ?>
	<div id='gallery'></div>
  	<script type='text/javascript'>
    $(document).ready(function () {
      GetCoverImageFromDB('WOMEN','cover');
    });
  </script>
<?php } ?>
