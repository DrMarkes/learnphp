<HTML>
<HEAD>
<TITLE>opendir</TITLE>
</HEAD>
<BODY>
<?
	$dir = opendir(".");

	while($name = readdir($dir)){
		
		if($name == '.' || $name == '..') {
			continue;
		}
		if(is_dir($name))
			echo '[<b>'.$name.'</b>]<br>';
		else
			echo $name.'<br>';
	}

	closedir($dir);
	
	echo "<pre>";
	print_r(scandir('.'));
	echo "</pre>";
	
?>
</BODY>
</HTML>