<?php
	include 'conexao.php'; 

	$acao=$_GET["acao"];

	if ($acao == "Incluir")
	{
		$idContato=0;
		$nome="";
		$fone="";
	}
	else
	{
		$idContato=$_GET["idContato"];
		
		$sql = "SELECT * 
				FROM contatos 
				WHERE idContato=".$idContato;
		$tabela = mysqli_query($conexao,$sql);
		$linha = mysqli_fetch_array($tabela);
		
		$nome=$linha['nome'];
		$fone=$linha['fone'];
	}
?>
<html>
	<head>
		<title>Fatec Jundiai - Programa Exemplo PHP</title>
	</head>
	<body>
		<form name="dados" method="post" action="manterOk.php?idContato=<?php echo $idContato; ?>">
			<p>
				Nome: <input type="text" name="nome" value="<?php echo $nome; ?>">
			</p>
			<p>
				Fone: <input type="text" name="fone" value="<?php echo $fone; ?>">
			</p>
			<p>
				<input type="submit" name="acao" value="<?php echo $acao; ?>">
				<input type="submit" name="acao" value="Cancelar">
			</p>
		</form>
	</body>
</html>
<?php
	mysqli_close($conexao);
?>