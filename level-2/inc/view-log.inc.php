<?php 
if(is_file(PATH_LOG)) {
	$log = file(PATH_LOG, FILE_SKIP_EMPTY_LINES);

	echo "<ol>";
	foreach ($log as $line) {
		list($dt, $path, $ref) = explode('|', $line);
		$dt = date('d-m-Y H:i:s', $dt);
		echo <<<LINE
		<li>
		$dt - $path -> <a href="$ref">$ref</a> 
		</li>
LINE;
	}
	echo "</ol>";
}
?>
