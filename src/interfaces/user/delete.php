<?php
session_start();
include('../../data/conn.php');
include('../../middleware/session.php');
include('../../middleware/user.php');

//delete user
if (isset($_POST['btn_delete'])) {
	$id = $_POST['id'];
	$i = htmlspecialchars($id);

	$query = "DELETE FROM users WHERE id_user = '$i';";
	if (mysqli_query($conn, $query)) {
		//$_SESSION['msg'] = 'Account Deleted';
		echo '<script>window.location.href="../shared/logout.php"</script>';
	} else {
		//$_SESSION['msg'] = 'Account NOT Deleted';
	}
}
