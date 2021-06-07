<?php

session_start();

//desloga funcionario
$_SESSION['funcionario-logado'] = FALSE;

// checa se cliente está logado
if(!isset($_SESSION["logado"]) || !isset($_SESSION["cliente"])){
    $_SESSION["logado"] = FALSE;
    $_SESSION["cliente"] = NULL;
}
$logado = $_SESSION["logado"];
$cliente = $_SESSION["cliente"];

if($logado === TRUE){
    echo "<script> alert('Você já está logado, senhor(a) ".$cliente.".') </script>";
}



?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Canal TI</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="./../../css_login/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="./../../css_login/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Login para funcionários</h3>
                    
                    
                    <div class="box">
                        <form action="processa-login-funcionario.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="matricula" class="input is-large" placeholder="Matricula" <?php if($logado === TRUE) echo "disabled"; ?> >
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input type='password' name="senha" class="input is-large" placeholder="Senha" <?php if($logado === TRUE) echo "disabled"; ?>>
                                </div>
                            </div>
                            <input type="submit" value="Entrar" class="button is-block is-link is-large is-fullwidth"></button>
                            <div>
                                <h3>
                                <a href="./../../index.php">Página inicial.</a>                                
                                </h3>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>