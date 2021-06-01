<?php

session_start();

include_once("./../conexao-bd/conexao.php");

// verfificando se existem os campos e se são null
if(isset($_POST["email"], $_POST["senha"]) && $_POST["email"] != NULL && $_POST["senha"] != NULL){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
}else{
    mysqli_close($conn);
    header("Location: login.php");
    die("Campos necessários inexistentes");
}

$query = "SELECT Nome, Email, Senha FROM Clientes
WHERE Email='".$email."' LIMIT 1";

$resultado_select = mysqli_fetch_assoc(mysqli_query($conn, $query));

if($resultado_select["Senha"] === $senha){
    $_SESSION["logado"] = TRUE;
    $_SESSION["cliente"] = $resultado_select["Nome"];
    $_SESSION["email-cliente"] = $resultado_select["Email"];

    header("Location: ./../../index.php");
}else{
    header("Location: login.php");
}

mysqli_close($conn);
?>