<?php

session_start();

include ("./../conexao-bd/conexao.php");

// verfificando se existem os campos e se são null
if(isset($_POST["matricula"], $_POST["senha"]) && $_POST["matricula"] != NULL && $_POST["senha"] != NULL){
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
}else{
    mysqli_close($conn);
    header("Location: login-funcionario.php");
    die("Campos necessários inexistentes");
}

$query = "SELECT Matricula, Senha FROM Funcionarios
WHERE Matricula='".$matricula."' LIMIT 1";

$resultado_select = mysqli_fetch_assoc(mysqli_query($conn, $query));

if($resultado_select["Senha"] === $senha){
    $_SESSION['funcionario-logado'] = TRUE;
    header("Location: ./../agenda/index.php");
}else{
    header("Location: login-funcionario.php");
}

mysqli_close($conn);
?>