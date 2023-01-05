<?php
session_start();
include('../../data/conn.php');
include('../../middleware/session.php');
include('../../middleware/user.php');

if (isset($_POST['btn_upload'])) {
	$msg = $_POST['message'];
	$id = $_POST['id'];

	$m = htmlspecialchars($msg);
	$i = htmlspecialchars($id);

	// destination of the file on the server
	$destination = '../../uploads/';
	// name of the uploaded file
	$file = $_FILES["fileName"]["name"];
	$path = pathinfo($file);
	$filename = $path['filename'];
	// get the file extension
	$extension = $path['extension'];
	$temp_name = $_FILES['fileName']['tmp_name'];
	$path_filename_ext = $destination . $filename . "." . $extension;

	$f = $filename . "." . $extension;

	// move the uploaded (temporary) file to the specified destination
	if (move_uploaded_file($temp_name, $path_filename_ext)) {
		$sql = "INSERT INTO feedback (message, file, id_user) VALUES ('$m', '$f', '$i')";
		if (mysqli_query($conn, $sql)) {
			$_SESSION['msg'] = "File uploaded successfully";
			echo '<script>window.location.href="feedback.php"</script>';
		}
	} else {
		$_SESSION['msg'] = "Failed to upload file.";
		echo '<script>window.location.href="feedback.php"</script>';
	};
}
