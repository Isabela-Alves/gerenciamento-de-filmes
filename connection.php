<?php

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "locadora");

$con = mysqli_connect(HOST, USER, PASS, DBNAME);

$sql= mysqli_query($con,"SELECT * FROM filmes");/*estou fazendo uma consulta(leitura) sql(meu banco)*/

echo mysqli_num_rows($sql);/*aqui ele vai imprimir a quantidade de linhas que tem no resultado da consulta*/

if (!$con) {
    echo "connection error";
}
