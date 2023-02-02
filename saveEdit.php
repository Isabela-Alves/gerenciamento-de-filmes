<?php
    // isset -> serve para saber se uma variável está definida
    require_once('connection.php');
    if(isset($_POST['update'])) /*verificando se o post update existe */
    {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $diretor = $_POST['diretor'];
        $genero = $_POST['genero'];
        $ano = $_POST['ano'];
        
        
        /*quero atualizar minha tabela */
        $sqlInsert = "UPDATE filmes 
        SET titulo='$titulo',diretor ='$diretor',genero='$genero' ,ano='$ano'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>
