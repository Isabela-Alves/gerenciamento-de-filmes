<?php
require_once('connection.php');
$id = $_GET['id'];

$titulo = $diretor = $genero = $ano = $msg = "";
if (isset($_POST['submit'])) {
    if (isset($_POST['titulo'])) {
        $titulo =  $_POST['titulo'];
    }
    if (isset($_POST['diretor'])) {
        $diretor =  $_POST['diretor'];
    }
    if (isset($_POST['genero'])) {
        $genero =  $_POST['genero'];
    }
    if (isset($_POST['ano'])) {
        $ano =  $_POST['ano'];
    }

    $query = "UPDATE  filmes SET titulo = '$titulo',  diretor = '$diretor',genero = '$genero', ano ='$ano'  WHERE id= '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
        Muito bem! Atualizacao feita com sucesso 
      </div>';
        "";
    } else {
        $msg = '<div class="alert alert-warning" role="alert">
        Error occurs while updating the query
      </div>';
    }
}
?>
<!doctype html>
<html lang="ar" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">


    <title></title>
    <style>
    body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
    }
    
    </style>
</head>

<body>
<div class="container">
        <div class="row py-5">
            <div class=" col-md-10 offset-md-1 border p-3">
                <span><?php echo $msg; ?></span>
                <?php
                $query  = "SELECT * FROM filmes WHERE id= '$id'";
                $result  = mysqli_query($con, $query);

                $num = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $num++;
                ?>

                    <h2>Edit student record:</h2>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="titulo" value="<?php echo $row['titulo']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDiretor1" class="form-label">Diretor</label>
                            <input type="text" class="form-control" id="exampleInputDiretor1" name="diretor" value="<?php echo $row['diretor']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputGenero1" class="form-label">Gênero</label>
                            <input type="text" class="form-control" id="exampleInputGenero1" name="genero" value="<?php echo $row['genero']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputAno1" class="form-label">Ano de lançamento</label>
                            <input type="number" class="form-control" id="exampleInputAno1" name="ano" value="<?php echo $row['ano']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    <?php

                   }
                ?>
          </div>

            <div class="col-md-12 text-center pt-5 ">
                <a href="sistema.php" class="btn btn-info">Go back</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->


</body>

</html>
