<?php	

	session_start();

	include_once("./../php/conexao-bd/conexao.php");

	if(!isset($_SESSION['carrinho-certificado'], $_SESSION['email-cliente']) || $_SESSION['carrinho-certificado'] == NULL || $_SESSION['email-cliente'] == NULL) die('Falta de dados');

	$cliente = $_SESSION['email-cliente'];

	$carrinho = $_SESSION['carrinho-certificado'];
	
	$result_cliente = "SELECT Nome FROM Clientes WHERE Email='".$cliente."' LIMIT 1";
	$resultado = mysqli_fetch_assoc(mysqli_query($conn, $result_cliente));

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	//Ajustando tamanho da página
	$tamanho_pag = array(0,0,560,360); // 0 0 largura altura
	$dompdf->set_paper($tamanho_pag);
	
	$produtos = "<ul>";

	foreach($carrinho as $item){
		$produtos .= "<li>".$item['Nome'].". </li>";
	}

	$produtos .= "</ul>";

	// Carrega seu HTML
	$dompdf->load_html('
			<link rel="stylesheet" href="./../css/css_certificado/certificado.css" />
			<h1 style="text-align: center;">Certificado de autenticidade</h1>
			<p style="text-align: center;">Parabéns ao obter com a verificação do mercado um item raro e exclusivo.</p>
			<p>Cliente: '.$resultado['Nome'].'. </p>
			'.$produtos.'
			<p><a href="http://localhost/trabalhos-da-faculdade--V2/index.php" target="_blank">Coins Raridades.com </a></p>
			<img src="./../img/Coin_logo.png" />

		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"certificado.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

	$_SESSION['carrinho-certificado'] = NULL;
?>