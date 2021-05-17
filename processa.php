<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


$result_usuario = "INSERT INTO usuarios (nome, email, cpf, senha, created) VALUES ('$nome', '$email', '$cpf', '$password', NOW())";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)) {
    header("Location: login.php");
}else{
    header("Location: index.php");
}




