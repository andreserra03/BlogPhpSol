<?php
session_start();
include('../../data/user.php');
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
</div>

<?php
include('../shared/scripts.php');
?>