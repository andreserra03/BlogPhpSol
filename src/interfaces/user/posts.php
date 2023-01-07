<?php
session_start();
include('../../data/user.php');
$title = 'Posts';
$active_page = 'Posts';
include('../../middleware/session.php');
include('../../middleware/user.php');
include('../shared/head.php');
include('../shared/sidebar.php');
?>

<div class="container mt-5">
	<h1>Posts</h1>
	<hr>
	<form action="create.php" method="post">
		<input hidden type="text" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Title</label>
			<input name="title_post" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title of Post">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Description</label>
			<textarea name="desc_post" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
		</div>
		<div class="mb-3">
			<button name="btn_create" type="submit" class="btn btn-success">Save</button>
		</div>
	</form>
	<h4><?php echo $_SESSION['msg'];
			$_SESSION['msg'] = ''; ?></h4>
</div>

<?php
include('../shared/scripts.php');
?>