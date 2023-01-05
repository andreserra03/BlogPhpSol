<?php
session_start();
include('../../data/conn.php');
$title = 'Perfil';
$active_page = 'Perfil';
include('../../middleware/session.php');
include('../../middleware/user.php');
include('../shared/head.php');
include('../shared/sidebar.php');
?>

<div class="container mt-5">
	<h1>Perfil</h1>
	<hr>
	<p>Utilizador: <?php $input = htmlspecialchars($_GET['u']); echo $input; ?></p>
	<hr>
	<div class="mt-5">
		<form action="delete.php" method="post">
			<input hidden type="text" name="id" value="<?php echo $_SESSION['id_user']; ?>">
			<button name="btn_delete" type="submit" class="btn btn-danger">Delete Account</button>
		</form>
	</div>
</div>

<?php
include('../shared/scripts.php');
?>