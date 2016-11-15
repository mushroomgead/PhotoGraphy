<?php
$category = 'men';
$flgmark  = 'cover';

if(isset($_GET['subpage'])){
  $subcategory = $_GET['subpage']; ?>
  <div id='gallery'></div>
  <script type='text/javascript'>
    $(document).ready(function () {
      GetImageFromDB('MEN',<?php echo "'".$subcategory."'"; ?>);
    });
  </script>

<?}else{ ?>
	<div id='gallery'></div>
  	<script type='text/javascript'>
    $(document).ready(function () {
      GetCoverImageFromDB('MEN','cover');
    });
  </script>
<?php } ?>