<?php
include('../../middleware/preventSession.php');
include('../../data/user.php');
$title = 'Feedback';
$active_page = 'Feedback';
include('../../middleware/session.php');
include('../../middleware/user.php');
include('../shared/head.php');
include('../shared/sidebar.php');

//echo exec('whoami');
?>

<div class="container mt-5">
	<h1>Feedback</h1>
	<hr>

	<form action="upload.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<input type="hidden" name="id" value="<?php echo $_SESSION['id_user'] ?>">
			<div class="col-4">
				<div class="form-floating">
					<textarea name="message" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
					<label for="floatingTextarea2">Message</label>
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-4">
				<div class="mb-3">
					<label for="formFile" class="form-label">Send file</label>
					<input class="form-control" type="file" name="fileName">
				</div>
			</div>
		</div>
		<button name="btn_upload" class="btn btn-primary" type="submit">Send</button>
		<div class="mt-5">
			<?php echo $_SESSION['msg'];
			$_SESSION['msg'] = ''; ?>
		</div>
	</form>

</div>

<?php
include('../shared/scripts.php');
?>