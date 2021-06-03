<?php
	include ("./../conexao-bd/conexao.php");
?>
<html>
	<head>
		<title>Estoque</title>
	</head>
	<body>
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
			FROM produtos 
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
					<?php echo $linha['foto']; ?>
				</td>
				<td>
					<?php echo $linha['Quantidade']; ?>
				</td>
				<td>
					<?php echo $linha['Descricao']; ?>
				</td>
				<td width=50 align="center">
					<a href="manter.php?acao=Alterar&ID=<?php echo $linha['ID']; ?>" >
						<img src="imagens/alterar.png" border="0">
					</a>
				</td>
				<td width=50 align="center">
					<a href="manter.php?acao=Excluir&ID=<?php echo $linha['ID']; ?>">
						<img src="imagens/excluir.png" border="0">
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