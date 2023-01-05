<?php
session_start();
include('../../data/conn.php');
include('../../middleware/session.php');
include('../../middleware/admin.php');

//Update User
if (isset($_POST['btn_update'])) {

	$username = $_POST['username'];
	$role = $_POST['user_role'];
	$id = $_POST['id_user'];
	$status = $_POST['user_status'];

	$u = htmlspecialchars($username);
	$r = htmlspecialchars($role);
	$i = htmlspecialchars($id);
	$s = htmlspecialchars($status);

	$sql2 = "UPDATE users SET name_user = '$u', role = '$r', status = '$s' WHERE id_user = '$i';";

	if ($res2 = mysqli_query($conn, $sql2)) {
		//array_push($success, "Record was updated successfully.");
		$_SESSION['msg'] = "Record was updated successfully.";
	} else {
		//array_push($errors, "Record was NOT updated successfully. " . $conn->error);
		$_SESSION['msg'] = "Record was NOT updated successfully. " . $conn->error;
	}
	echo '<script> window.location.href="edit.php?id=' . $id . '"</script>';
	mysqli_close($conn);
}
