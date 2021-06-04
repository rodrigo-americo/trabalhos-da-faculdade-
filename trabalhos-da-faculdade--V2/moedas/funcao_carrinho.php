<?php
//include ("./../php/conexao-bd/conexao.php");
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
    //session_destroy();
    $_SESSION['carrinho'] = NULL;
    $_SESSION['valortotal'] = 0;
    $_SESSION['valor_com_desconto'] = 0;
    $_SESSION['desconto'] = 1;
}
// atribui itens ao carinho
function adicionar($ID){
    if (!ja_tem($ID)) {
        $produto = buscarProduto($ID);
        $_SESSION['valortotal'] += floatval($produto['Valor']);
        array_push($_SESSION['carrinho'], array('ID' => $produto['ID'],'Quantidade' => 1, 'Valor' => floatval($produto['Valor'])));
    }else{
        for($i = 0; $i< count($_SESSION['carrinho']); $i++){
            if($_SESSION['carrinho'][$i]['ID'] == $ID){
                $_SESSION['carrinho'][$i]['Quantidade'] += 1;
                $_SESSION['valortotal'] += $_SESSION['carrinho'][$i]['Valor'];
            }
        }
        //$_SESSION['carrinho'][0]['Quantidade'] += 1;
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
    $produtos= mysqli_query($conn,' SELECT * FROM Produtos ') ;
    mysqli_close($conn);
    return $produtos;
}
function buscarProduto($ID) {
    $conn=ligaBD();
    $produto=mysqli_query($conn," SELECT * FROM Produtos WHERE ID=".$ID." LIMIT 1") ;
    $produto= mysqli_fetch_assoc($produto);
    mysqli_close($conn);
    return $produto;
}
function cria_lista_de_produtos(){
    $produtos = lerBd();
    $lista_de_produtos = '<SELECT NAME="produtos" class="form-select" required>';
    echo $lista_de_produtos;
    while($produto = mysqli_fetch_array($produtos)){
        $produto ='<option value="'.$produto['ID'].'"> '.$produto['Nome'].', valor: '.$produto['Valor'].' R$</option>';
        echo $produto;
    }
    $lista_de_produtos = '</SELECT>';
    echo $lista_de_produtos;
}

function salvarBD(){
    if($_SESSION['carrinho'] == NULL || count($_SESSION['carrinho']) == 0  || $_SESSION['email-cliente'] == NULL) return;
    
    $conn = ligaBD();

    $data = getdate();
    $data_formatada = $data['year']."-".$data['mon']."-".$data['mday']; // ano-mes-dia
    
    $email_cliente = $_SESSION['email-cliente'];

    //lida com checkboxs
    if(isset($_POST['entrega-24h']) && $_POST['entrega-24h'] != NULL ) $entrega24h = 1;
    else $entrega24h = 0;

    if(isset($_POST['entrega-correios']) && $_POST['entrega-correios'] != NULL ) $entregaCorreios = 1;
    else $entregaCorreios = 0;

    $query = "INSERT INTO Compras (Codigo, Data_Compra, ID_Produto, Email_Cliente, Quantidade, Entrega_24h, Entrega_Correios) VALUES ";

    foreach ($_SESSION['carrinho'] as $item_carrinho) {
        $query .= "(NULL, '".$data_formatada."', ".$item_carrinho['ID'].", '".$email_cliente."', ".$item_carrinho['Quantidade'].", ".$entrega24h.", ".$entregaCorreios."),";        
    }

    $query = substr($query, 0, -1);

    $resultado_insert = mysqli_query($conn, $query);

    if($resultado_insert === TRUE){
        echo "<script> alert('Compra concluida com sucesso.') </script>";
    }else{
        echo "<script> alert('Falha ao processar compra.') </script>";
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>