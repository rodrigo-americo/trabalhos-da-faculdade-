<?php
// se arquivo json e o converte para array 
function lejason(string $nome_do_arquivo)
{
    $arquivo = file_get_contents($nome_do_arquivo);
    return $arquivo = json_decode($arquivo);
}
//da a data e hora (trasnformar em function)
function geradata()
{

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    $data = 'Jundiai, ' . strftime('%d de %B de %Y', strtotime('today'));
    return $data;
}
// cria arquivo com nome, nome do produto, valor ,data,valor,valor_total,valor_com_desconto,entrega e atualizcao
function criatxt($data)
{
    if (isset($_POST['entrega'])) {
        $entrega = $_POST['entrega'] . "\n";
    } else {
        $entrega = "";
    }
    
    $fp = fopen('nota_fisacal.txt', 'w+');
    foreach ($_SESSION['carrinho'] as $item) {
        $nome = 'nome: ' . $item['nome'] . "\n";
        $valor = 'valor: R$ ' . $item['valor'] . "\n";
        $valor_total = 'valor total : R$ ' . $_SESSION['valortotal'] . "\n";
        $valor_com_desconto = 'valor com desconto : R$ ' . $_SESSION['valor_com_desconto'] . "\n";
        $divide = '---------' . "\n";
        $nome_item = 'nome do produto: ' . $item['nome_do_produto'] . "\n";
        fwrite($fp, $nome); // pegar do banco de dados
        fwrite($fp, $nome_item); // pegar do banco de dados
        fwrite($fp, $valor); // pegar do banco de dados

        fwrite($fp, $divide);
    }
    fwrite($fp, $valor_total);
    fwrite($fp, $valor_com_desconto);
    fwrite($fp, $entrega);
    // fwrite($fp, $atualizacao);  pegar do banco de dados
    fwrite($fp, $data);
    fclose($fp);
}
?>