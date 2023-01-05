<?php
session_start();

//Se não for manager, volta para a pagina anterior
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Manager') {
	echo '<script>window.location.href="../shared/noPermission.php"</script>';
}
