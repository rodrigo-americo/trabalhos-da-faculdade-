<?php
	include("./../conexao-bd/conexao.php"); 

	$acao=$_GET["acao"];

	if ($acao == "Incluir")
	{
		$ID=0;
		$Nome="";
		$Valor="";
		$Foto="";
		$Descricao="";
		$Quantidade="";
	}
	else
	{
		$ID=$_GET["ID"];
		
		$sql = "SELECT * 
				FROM Produtos
				WHERE ID=".$ID;
		$tabela = mysqli_query($conn,$sql);
		$linha = mysqli_fetch_array($tabela);
		
		$Nome=$linha['Nome'];
		$Valor=$linha['Valor'];
		$Foto=$linha['Foto'];
		$Descricao=$linha['Descricao'];
		$Quantidade=$linha['Quantidade'];

	}
?>
<html>
	<head>
		<title>Estoque</title>
	</head>
	<body>
		<form name="dados" method="post" action="manterOk.php?ID=<?php echo $ID; ?>">
			<p>
				Nome: <input type="text" name="Nome" value="<?php echo $Nome; ?>">
			</p>
			<p>
				Valor: <input type="text" name="Valor" value="<?php echo $Valor; ?>">
			</p>
			<p>
				Foto: <input type="text" name="Foto" value="<?php echo $Foto; ?>">
			</p>
			<p>
				Quantidade: <input type="text" name="Quantidade" value="<?php echo $Quantidade; ?>">
			</p>
			<p>
				Descricao: <input type="text" name="Descricao" value="<?php echo $Descricao; ?>">
			</p>
			<p>
				<input type="submit" name="acao" value="<?php echo $acao; ?>">
				<input type="submit" name="acao" value="Cancelar">
			</p>
		</form>
	</body>
</html>
<?php
	mysqli_close($conn);
?>