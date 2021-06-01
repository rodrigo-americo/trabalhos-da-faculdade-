<?php

session_start();

$_SESSION["logado"] = FALSE;
$_SESSION["cliente"] = NULL;
$_SESSION["email-cliente"] = NULL;

header("Location: ./../../index.php");
?>