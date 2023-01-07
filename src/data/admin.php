<?php
define("USER_BD", getenv('DB_ADMIN'));
define("PASS_BD", getenv('PASS_ADMIN'));
define("BD", getenv('DB'));
define("HOST", getenv('HOST'));

//fazer ligacao ao servidor mysql
if (!($conn = mysqli_connect(HOST, USER_BD, PASS_BD))) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

//Selecionar a base de dados
if (!($selectBD = mysqli_select_db($conn, BD))) {
  echo "Erro ao selecionar a base de dados" .  $mysqli->connect_error;
  exit();
}
