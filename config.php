<?php 

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "locadora");

$conexao = mysqli_connect(HOST, USER, PASS, DBNAME);

$sql= mysqli_query($conexao,"SELECT * FROM autentificacao");/*estou fazendo uma consulta sql*/


if (!$conexao) {
    echo "connection error";
}
