<?php
    // estanciam o carrinho 
    function cria_carinho(){
        $_SESSION['carrinho'] = array();
        $_SESSION['valortotal'] = 0;
        $_SESSION['valor_com_desconto'] = 0;
        $_SESSION['desconto'] = 1;
    }
?>