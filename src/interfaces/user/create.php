<?php
include('../../middleware/preventSession.php');
include('../../data/user.php');
include('../../middleware/session.php');
include('../../middleware/user.php');


if (isset($_POST['btn_create'])) {

	$title = $_POST['title_post'];
	$desc = $_POST['desc_post'];
	$id_user = $_POST['id_user'];

	//sanitizar  data
	$t = htmlspecialchars($title);
	$d = htmlspecialchars($desc);
	$i = htmlspecialchars($id_user);

	$sql2 = "CALL CreatePost('$t','$d','$i');";
	if ($res2 = mysqli_query($conn, $sql2)) {
		//array_push($success, "Record was updated successfully.");
		$_SESSION['msg'] = "Record was updated successfully.";
	} else {
		//array_push($errors, "Record was NOT updated successfully. " . $conn->error);
		$_SESSION['msg'] = "Record was NOT updated successfully.";
	}
	echo '<script> window.location.href="posts.php"</script>';
	mysqli_close($conn);
}
