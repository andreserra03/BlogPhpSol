<?php
session_start();
ini_set ('error_reporting', E_ALL);
ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');

require_once('data/notUser.php');
$title = 'Login';
include('middleware/isLogged.php');
include('interfaces/shared/head.php');

$errors = [];
$success = [];

//Se pressionou no botao de login
if (isset($_POST['btn_login'])) {
	$user = $_POST['username'];
	$pw = $_POST['password'];

	//verificar se estao preenchidos
	if (empty($user)) {
		array_push($errors, "Username not filled");
	}
	if (empty($pw)) {
		array_push($errors, "Password not filled");
	}

	if (empty($errors)) {
		//query sql
		$sql = "CALL GetUser('$user');";
		$result = mysqli_query($conn, $sql);

		if ($row = mysqli_num_rows($result) > 0) {
			if ($row = mysqli_fetch_assoc($result)) {
				if (password_verify($pw, $row["password"])) {
					//criar sessoes
					$_SESSION['isLogged'] = true;
					$_SESSION['id_user'] = $row['id_user'];
					$_SESSION['user'] = $row['name_user'];
					$_SESSION['role'] = $row['role'];
					$_SESSION['status'] = $row['status'];
					//session id prevention
					$_SESSION['ipaddress'] = $_SERVER['REMOTE_ADDR'];
					$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['lastaccess'] = time();
					//ir para a pagina inicial
					error_log("Session: \t" . $_SESSION['id_user'] .' - '. $_SESSION['user'] . "\t". date("Y-m-d h:i:sa"). "\n", 3, "registos/reg.log");
					echo '<script> window.location.href="/interfaces/shared/home.php"</script>';
				} else {
					array_push($errors, "Password incorrect");
					error_log("Password Incorrect \t" . $sql . date("Y-m-d h:i:sa"). "\n", 3, "registos/reg.log");
				}
			}
		} else {
			array_push($errors, "Incorrect Data");
			error_log("Data Incorrect \t" . $sql . date("Y-m-d h:i:sa"). "\n", 3, "registos/reg.log");
		}
	}
}
?>
<!-- Body -->
<div class="vh-100 d-flex justify-content-center align-items-center">
	<div class="col-md-4 p-5 shadow-sm border rounded-3">
		<h2 class="text-center mb-4 text-primary">Login Form</h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div class="mb-3">
				<label for="exampleInputUsername" class="form-label">Username</label>
				<input name="username" type="text" class="form-control border border-primary" id="exampleInputUsername">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword" class="form-label">Password</label>
				<input name="password" type="password" class="form-control border border-primary" id="exampleInputPassword">
			</div>
			<?php include "interfaces/shared/error.php" ?>
			<div class="d-grid">
				<button class="btn btn-primary" name="btn_login" type="submit">Login</button>
			</div>
			<div class="mt-3 text-center">
				<a href="registo.php">Registar</a>
				<hr>
				<?php if (isset($_SESSION["msg"]))
				{
					echo $_SESSION["msg"]; 
					$_SESSION["msg"] = '';
				} ?>
			</div>
		</form>
	</div>
</div>

<?php
include('interfaces/shared/scripts.php');
?>