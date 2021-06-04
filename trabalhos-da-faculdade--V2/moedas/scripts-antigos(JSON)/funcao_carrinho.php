<?php
include ("../php/conexao-bd/conexao.php");
// teste se ja tem o mesmo item do carinho 
function ja_tem($ID){
    foreach ($_SESSION['carrinho'] as $produto) {
        if ($produto['ID'] == $ID) {
            return true;
        }
    }
    return false;
}
// reseta o carrinho
function resetar(){
    session_destroy();
    $_SESSION['valortotal'] = 0;
}
// atribui itens ao carinho
function adicionar($ID){
    if (!ja_tem($ID)) {
        $produto = buscarProduto($ID);
        $_SESSION['valortotal'] += floatval($produto['Valor']);
        array_push($_SESSION['carrinho'], array('ID' => $produto['ID']));
    }
}
function ligaBD(){
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "php-fatec";
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die("Falha conexão");
    return $conn;
}
function lerBd() {
    $conn=ligaBD();
    $produtos=mysqli_query($conn,' SELECT * FROM produtos ') ;
    return $produtos;
}
function buscarProduto($ID) {
    $conn=ligaBD();
    $produto=mysqli_query($conn,' SELECT * FROM produtos WHERE ID='.$ID.'') ;
    $produto= mysqli_fetch_array($produto);
    return $produto;
}
function cria_lista_de_produtos(){
    $produtos = lerBd();
$lista_de_produtos = '<SELECT NAME="produtos" class="form-select" required>';
    echo $lista_de_produtos;
    foreach ($produtos as $produto){
        $produto ='<option value='.$produto['ID'].'> '.$produto['Nome'].'valor '.$produto['Valor'].'</option>';
        echo $produto;
    }
$lista_de_produtos .= '</SELECT>';
    echo $lista_de_produtos;
}
?>