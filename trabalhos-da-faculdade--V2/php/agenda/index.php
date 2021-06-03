<?php
	include 'conexao.php'; 
?>
<html>
	<head>
		<title>Fatec Jundiai - Programa Exemplo PHP</title>
	</head>
	<body>
		<table align=center border=1 width=50%>
			<tr>
				<td align=center colspan=5>CONTATOS</td>
			</tr>
				<td align="center">
					<b>ID</b>
				</td>
				<td><b>Nome</b></td>
				<td><b>Fone</b></td>
				<td align="center" colspan="2">
					<a href="manter.php?acao=Incluir"><b>INCLUIR</b></a>
				</td>
			</tr>
<?php
	// Fazendo uma consulta SQL
	$sql = "SELECT * 
			FROM contatos 
			ORDER BY nome";
	$tabela = mysqli_query($conexao,$sql);
	while ($linha = mysqli_fetch_array($tabela))
	{
?>
			<tr>
				<td align="center">
					<?php echo $linha['idContato']; ?>
				</td>
				<td>
					<?php echo $linha['nome']; ?>
				</td>
				<td>
					<?php echo $linha['fone']; ?>
				</td>
				<td width=50 align="center">
					<a href="manter.php?acao=Alterar&idContato=<?php echo $linha['idContato']; ?>" >
						<img src="imagens/alterar.png" border="0">
					</a>
				</td>
				<td width=50 align="center">
					<a href="manter.php?acao=Excluir&idContato=<?php echo $linha['idContato']; ?>">
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
	mysqli_close($conexao);
?>