<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) /*se existir essa minha variavel */
    {
        /* vai deixar acessar o meu sistema */
        require_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        
         /*verificando os parametros existem no meu banco */
        $sql = "SELECT * FROM autentificacao WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        

        if(mysqli_num_rows($result) < 1)  /*numero de linhas for maio que 0 */
        {
            unset($_SESSION['email']); /*se nao existir ele me deixa na tela de login,for menor */
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['email'] = $email; /*se existir ele vai me direcionar para a tela onde esta o crud  */
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: login.php');
    }
?>
