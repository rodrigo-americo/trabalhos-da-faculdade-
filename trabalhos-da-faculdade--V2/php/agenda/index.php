<?php
	session_start();
	
	include ("./../conexao-bd/conexao.php");

	if(!isset($_SESSION['funcionario-logado']) || $_SESSION['funcionario-logado'] == FALSE ){
		header('Location: ./../cadastro-e-login/login-funcionario.php');
		die('Funcionário precisa realizar login');
	}

?>
<html>
	<head>
		<title>Estoque</title>
		<link rel="stylesheet" href="./../../css/estoque.css" />
	</head>
	<body>
		<h3>
        	 <a href="./../../index.php">Página inicial.</a>                                
        </h3>
		<table align=center border=1 width=50%>
			<tr>
				<td align=center colspan=5>Produtos</td>
			</tr>
				<td align="center">
					<b>ID</b>
				</td>
				<td><b>Nome</b></td>
				<td><b>valor</b></td>
				<td><b>foto</b></td>
				<td><b>quantidade</b></td>
				<td><b>descricao</b></td>
				
				<td align="center" colspan="2">
					<a href="manter.php?acao=Incluir"><b>INCLUIR</b></a>
				</td>
			</tr>
<?php
	// Fazendo uma consulta SQL
	$sql = "SELECT * 
			FROM Produtos 
			ORDER BY id";
	$tabela = mysqli_query($conn,$sql);
	while ($linha = mysqli_fetch_array($tabela))
	{
?>
			<tr>
				<td align="center">
					<?php echo $linha['ID']; ?>
				</td>
				<td>
					<?php echo $linha['Nome']; ?>
				</td>
				<td>
					<?php echo $linha['Valor']; ?>
				</td>
				<td>
					<img src="./../../img/<?php echo $linha['Foto']; ?>" class="moeda"/>
				</td>
				<td>
					<?php echo $linha['Quantidade']; ?>
				</td>
				<td>
					<?php echo $linha['Descricao']; ?>
				</td>
				<td width=50 align="center">
					<a href="manter.php?acao=Alterar&ID=<?php echo $linha['ID']; ?>" >
						<img src="imagens/alterar.png" border="0" class="system-icon">
					</a>
				</td>
				<td width=50 align="center">
					<a href="manter.php?acao=Excluir&ID=<?php echo $linha['ID']; ?>">
						<img src="imagens/excluir.png" border="0" class="system-icon">
					</a>
				</td>
			</tr>
<?php
	}
?>
		</table>
	</body>
</html>
<?php
	mysqli_close($conn);
?>