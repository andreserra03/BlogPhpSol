<?php
session_start();
include('../../data/admin.php');
$title = 'Edit User';
$active_page = 'Users';
include('../../middleware/session.php');
include('../../middleware/admin.php');
include('../shared/head.php');
include('../shared/sidebar.php');


$errors = [];
$success = [];

$userId = $_GET['id'];
$sql = "CALL GetUserById('$userId')";
$res = mysqli_query($conn, $sql);

if ($row = mysqli_num_rows($res) > 0) {
	$row = mysqli_fetch_assoc($res);
}

?>

<div class="container mt-5">

	<form action="update.php" method="post">
		<div class="mb-3">
			<div class="row">
				<input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
				<div class="col-4">
					<label for="exampleFormControlInput1" class="form-label">User Name</label>
					<input name="username" type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['name_user'] ?>">
				</div>
				<div class="col-4">
					<label for="exampleFormControlInput2" class="form-label">Role</label>
					<div class="input-group mb-3">
						<select name="user_role" class="form-select" id="exampleFormControlInput2">
							<option <?php if ($row['role'] == 'Admin') {
												echo 'selected="selected"';
											} ?> value="Admin">Admin</option>
							<option <?php if ($row['role'] == 'Manager') {
												echo 'selected="selected"';
											} ?> value="Manager">Manager</option>
							<option <?php if ($row['role'] == 'User') {
												echo 'selected="selected"';
											} ?> value="User">User</option>
						</select>
					</div>
				</div>
				<div class="col-4">
					<label for="exampleFormControlInput2" class="form-label">Status</label>
					<div class="input-group mb-3">
						<select name="user_status" class="form-select" id="exampleFormControlInput2">
							<option <?php if ($row['status'] == '0') {
												echo 'selected="selected"';
											} ?> value="0">Inactive</option>
							<option <?php if ($row['status'] == '1') {
												echo 'selected="selected"';
											} ?> value="1">Active</option>
						</select>
					</div>
				</div>
				<div class="col-4">
					<button name="btn_update" class="btn btn-success">Save</button>
				</div>
				<div class="row">
					<div class="col-4">
						<?php echo $_SESSION['msg'], $_SESSION['msg'] = '' ?>
					</div>
				</div>
			</div>
	</form>
</div>

<!-- parte de sidebar -->
</main>
<?php
include('../shared/scripts.php');
?>