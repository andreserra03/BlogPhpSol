<?php
session_start();
include('../../data/conn.php');
$title = 'Edit Users';
$active_page = 'Users';
include('../../middleware/session.php');
include('../../middleware/admin.php');
include('../shared/head.php');
include('../shared/sidebar.php');


$sql = "Select * from users";
$res = mysqli_query($conn, $sql);

$users = [];

if ($row = mysqli_num_rows($res) > 0) {
	while ($row = mysqli_fetch_assoc($res)) {
		array_push($users, $row);
	}
}
?>

<div class="container mt-5">
	<h1>Users</h1>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Username</th>
				<th scope="col">Role</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) : ?>
				<tr>
					<th scope="row"><?php echo $user['id_user'] ?></th>
					<td><?php echo $user['name_user'] ?></td>
					<td><?php echo $user['role'] ?></td>
					<td>
						<!-- Button trigger modal -->
						<a href="edit.php?id=<?php echo $user['id_user'] ?>" class="btn btn-info">
							Edit
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<!-- parte de sidebar -->
	</main>
	<?php
	include('../shared/scripts.php');
	?>