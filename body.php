<?php ob_start(); ?>
<div class="body">




            <?php
                include('./menu.php');
                include('./content.php');
            ?>
</div>
<?php ob_end_flush();?>
