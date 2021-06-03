<?php
include ("./../conexao-bd/conexao.php");
	$acao=$_POST['acao'];

	if ($acao == "Cancelar")
	{
		//break;
	}
	else
	{
		include 'conexao.php'; 

		$ID=$_GET['ID'];
		$Nome=$_POST['Nome'];
		$Valor=$_POST['Valor'];
		$Foto=$_POST['Foto'];
		$Descricao=$_POST['Descricao'];
		$Quantidade=$_POST['Quantidade'];

		switch ($acao) {
			case "Alterar":
				$sql = "UPDATE produtos SET 
						Nome='$Nome', 
						Valor='$Valor',
						foto='$foto',
						Descricao='$Descricao',
						Quantidade='$Quantidade'
						WHERE ID='$ID'";
				break;
			
			case "Excluir":
				$sql = "DELETE FROM produtos 
						WHERE ID='$ID'";
				break;
			
			case "Incluir":
				$sql = "INSERT INTO produtos 
						(Nome, Valor,foto,Descricao,Quantidade) 
						VALUES 
						('$Nome', '$Valor', '$foto', '$Descricao', '$Quantidade')";
				break;
		}
		$tabela = mysqli_query($conn,$sql) or die (mysqli_error($conn));            
		
		mysqli_close($conn);
	}
	header("Location: index.php");
?>
