<?php
// teste se ja tem o mesmo item do carinho 
function ja_tem($nome_produto){
    foreach ($_SESSION['carrinho'] as $produto) {
        if ($produto['nome_do_produto'] === $nome_produto) {
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
function adicionar($nome, $nome_produto){
    if (!ja_tem($nome_produto)) {
        $produtos = lejason('Produtos.json');
        foreach($produtos as $produto){
            $_SESSION['valortotal'] = $_SESSION['valortotal'] + floatval($produto->valor);
            array_push($_SESSION['carrinho'], array('nome' => $nome, 'nome_do_produto' => $produto->nome_do_produto, 'valor' => $produto->valor));
        }

    }
}

function cria_lista_de_produtos(){
    $produtos =lejason('Produtos.json');
$lista_de_produtos = '<SELECT NAME="produtos" class="form-select" required>';
    foreach ($produtos as $produto) {
    $outrascoisas = $produto->nome . '-' . $produto->valor;
    $lista_de_produtos .= '<OPTION VALUE="' . $outrascoisas . '">' . $produto->nome_do_produto . ' R$ ' . $produto->valor . '</OPTION>';
    }
$lista_de_produtos .= '</SELECT>';
    echo $lista_de_produtos;
}
?>