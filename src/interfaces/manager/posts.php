<?php
session_start();
include('../../data/manager.php');
$title = 'Posts';
$active_page = 'Posts';
include('../../middleware/session.php');
include('../../middleware/manager.php');
include('../shared/head.php');
include('../shared/sidebar.php');

$sql = "CALL GetPosts();";
$res = mysqli_query($conn, $sql);
$posts = [];

if ($row = mysqli_num_rows($res) > 0) {
	while ($row = mysqli_fetch_assoc($res)) {
		array_push($posts, $row);
	}
}
?>

<div class="container mt-5">
	<h1>Posts</h1>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">User</th>
				<th scope="col">Post</th>
				<th scope="col">Message</th>
				<th scope="col">Hidden</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($posts as $post) : ?>
				<form action="update.php" method="post">
					<tr>
						<th scope="row"><?php echo $post['id_post'] ?></th>
						<td><?php echo $post['name_user'] ?></td>
						<td><?php echo $post['title'] ?></td>
						<td><?php echo $post['description'] ?></td>
						<td>
							<input name="post_hide" class="no-border" readonly type="text" value="<?php echo $post['hide'] ?>">
							<?php if ($post['hide'] == '0') {
								echo 'Showing';
							} else {
								echo 'Hidding';
							} ?>
						</td>
						<td>
							<input name="id_post" hidden type="text" value="<?php echo $post['id_post'] ?>">
							<button name="btn_hide" type="submit" class="btn btn-warning">Hide</button>
						</td>
					</tr>
				</form>
			<?php endforeach; ?>
		</tbody>
	</table>
	<h4><?php echo $_SESSION['msg'];
			$_SESSION['msg'] = ''; ?></h4>
</div>

<style>
	.no-border {
		border: 0;
		width: 25px;
	}
</style>

<?php
include('../shared/scripts.php');
?>