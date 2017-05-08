<pre>
<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		print_r($_FILES);

		$tmp = $_FILES['userfile']['tmp_name'];
		$name = $_FILES['userfile']['name']; 
		if(!move_uploaded_file($tmp, 'upload/' . $name)) {
			echo 'Файл не сохранен';
		}
	}
?>
<form action='upload.php' method='post' enctype='multipart/form-data'>
<input type='file' name='userfile'>
<input type='submit'>
</form>