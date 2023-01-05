<?php
session_start();

//Se não for user, volta para a pagina anterior
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'User') {
	echo '<script>window.location.href="../shared/noPermission.php"</script>';
}
