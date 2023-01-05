<?php
session_start();

if (!isset($_SESSION['isLogged']) || !isset($_SESSION['id_user']) || !isset($_SESSION['user']) || $_SESSION['status'] != 1) {
	echo '<script>window.location.href="../../index.php"</script>';
}
