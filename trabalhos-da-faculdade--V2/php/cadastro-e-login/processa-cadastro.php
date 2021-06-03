<?php
//mysqli_report(MYSQLI_REPORT_ALL);
include_once("./../conexao-bd/conexao.php");

//verfificando se existem os campos e se são null
if(isset($_POST["nome"], $_POST["senha"], $_POST["endereco"], $_POST["email"]) && $_POST["nome"] != NULL && $_POST["senha"] != NULL && $_POST["endereco"] != NULL && $_POST["email"] != NULL){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
}else{
    mysqli_close($conn);
    header("Location: cadastro.php");
    die("Campos necessários inexistentes");
}

//recebendo checkbox
if(isset($_POST["aceita-notificacao"])) $aceita_notificacao = boolval($_POST["aceita-notificacao"]);
else $aceita_notificacao = 0;

$query = "INSERT INTO clientes (Nome, Email, Endereco, Senha, Aceita_notificacao) 
VALUES ('".$nome."', '".$email."', '".$endereco."', '".$senha."', '".$aceita_notificacao."') ";

$resultado_insert = mysqli_query($conn, $query);

if($resultado_insert === TRUE) {
    header("Location: login.php");
}else{
    //echo mysqli_error($conn);
    header("Location: cadastro.php");
}

mysqli_close($conn);
?>
