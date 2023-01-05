<?php

if (isset($_SESSION['isLogged']) && $_SESSION['status'] != 0) {
	echo '<script>window.location.href="interfaces/shared/home.php"</script>';
}
