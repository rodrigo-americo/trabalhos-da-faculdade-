<?php
	$acao=$_POST['acao'];

	if ($acao == "Cancelar")
	{
		//break;
	}
	else
	{
		include 'conexao.php'; 

		$idContato=$_GET['idContato'];
		$nome=$_POST['nome'];
		$fone=$_POST['fone'];
 
		switch ($acao) {
			case "Alterar":
				$sql = "UPDATE contatos SET 
						nome='$nome', 
						fone='$fone' 
						WHERE idContato='$idContato'";
				break;
			
			case "Excluir":
				$sql = "DELETE FROM contatos 
						WHERE idContato='$idContato'";
				break;
			
			case "Incluir":
				$sql = "INSERT INTO contatos 
						(nome, fone) 
						VALUES 
						('$nome', '$fone')";
				break;
		}
		$tabela = mysqli_query($conexao,$sql) or die (mysqli_error());            
		
		mysqli_close($conexao);
	}
	header("Location: index.php");
?>
