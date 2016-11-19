<div id='gallery'></div>

<script type='text/javascript'>
    $(document).ready(function () {
        <?php if(isset($_GET['subpage'])) { ?>
            GetImageFromDB('MEN',<?php echo $_GET['subpage']; ?>);
        <?php }else{ ?>
            GetCoverImageFromDB('MEN','cover');
        <?php } ?>
    });
</script>