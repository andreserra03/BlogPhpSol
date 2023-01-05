<?php
define("USER_BD", "root");
define("PASS_BD", "Gh4nO7!#ft");
define("BD", "blog");
define("HOST", "db");

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
