<?php
    session_start();
    require_once('connection.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) /*verificando se existe uma sessao com senha e email */
    {
        unset($_SESSION['email']); /*se nao existir */
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email']; /*se existir,(varavel logado) ele me deixa acessar o sistema.php */
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];  
        $sql = "SELECT * FROM autentificacao WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {                  /*listar todos os registro da minha tabela e apresentar na tela */
        $sql = "SELECT * FROM autentificacao ORDER BY id DESC";/*ordenar do maior para o menor */
    }
    $result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>SISTEMA | GN</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        .table>:not(caption)>*>* {
    padding: .5rem .5rem;
    background-color: #adf;
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px #adf;
       }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DA IS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-10 offset-md-1 text-end pb-3 pt-5">
                <a href="add.php" class="btn btn-info">Add new record</a>
            </div>
            <div class="col-md-10 offset-md-1 border p-3">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Sn </th>
                            <th>Action </th>
                            <th>Título</th>
                            <th>Diretor</th>
                            <th>Gênero</th>
                            <th>Ano</th>

                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                        $query  = "SELECT * FROM filmes";
                        $result  = mysqli_query($con, $query); /*vai mostrando o numero de lishas que eu tiver */

                        $num_rows  = mysqli_num_rows($result);

                        $num = 0;
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $num++;
                        ?>
                                <tr>
                                    <th><?php echo $num; ?></th>
                                    <th>
                                        <a href="edit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                        <a href="delete.php?id=<?php echo $row['id']; ?> " onClick="return confirm('Tem certeza que deseja deletar? esta acao nao pode ser desfeita...')"><i class="fas fa-trash"></i></a>
                                    </th>
                                    <th><?php echo $row['titulo']; ?></th>
                                    <th><?php echo $row['diretor']; ?></th>
                                    <th><?php echo $row['genero']; ?></th>
                                    <th><?php echo $row['ano']; ?></th>
                                </tr>
                        <?php

                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>
