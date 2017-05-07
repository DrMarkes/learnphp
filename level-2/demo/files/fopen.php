<HTML>
<HEAD>
<TITLE>fopen</TITLE>
</HEAD>
<BODY>
	<?php
	$myfile = fopen('data.txt', 'r') or die('Не могу открыть файл');

	echo "Open";
	fclose($myfile);
	echo "Close";
 	?>
</BODY>
</HTML>