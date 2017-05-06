<?php 
if(!drawMenu($leftMenu, 0)) {
	echo ERR_DRAW_ON_BOTTOM_MENU;
}
?>
<hr>
© <?php echo COPYRIGHT, ", 2000 - $year"; ?>
<hr>
<p>Powerd by <?php echo $_SERVER['SERVER_SOFTWARE'] ?> /PHP <?php 
	echo PHP_VERSION ?> on <?php echo PHP_OS ?></p>