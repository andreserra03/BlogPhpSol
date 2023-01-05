<?php
session_start();

//Se não for admin, volta para a pagina anterior
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Admin') {
	echo '<script>window.location.href="../shared/noPermission.php"</script>';
}

