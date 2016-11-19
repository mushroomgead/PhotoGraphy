<div id='gallery'></div>

<script type='text/javascript'>
    $(document).ready(function () {
        <?php if(isset($_GET['subpage'])) { ?>
            GetImageFromDB('WOMEN',<?php echo $_GET['subpage']; ?>);
        <?php }else{ ?>
            GetCoverImageFromDB('WOMEN','cover');
        <?php } ?>
    });
</script>