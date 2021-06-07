<?php	
    
    function gerarPDF($carrinho){
        $_SESSION['carrinho-certificado'] = $carrinho;
        header('Location: ./../pdf/index.php');
        
    }
?>