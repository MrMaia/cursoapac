<?php
// conectar ao banco de dados
$host = "localhost";
$user = "usuario";
$pass = "senha";
$dbname = "banco_de_dados";
$conn = mysqli_connect($host, $user, $pass, $dbname);

// verificar se houve erro na conexão
if (!$conn) {
	die("Falha na conexão: " . mysqli_connect_error());
}

// obter os valores dos campos do formulário
$nome = $_POST["nome"];
$local = $_POST["local"];
$area = $_POST["area"];
$estacao = $_POST["estacao"];

// inserir os dados no banco de dados
$sql = "INSERT INTO usuarios (nome, local, area, estacao) VALUES ('$nome', '$local', '$area', '$estacao')";
if (mysqli_query($conn, $sql)) {
	if (mysqli_affected_rows($conn) > 0) {
		echo "Dados salvos com sucesso!";
	} else {
		echo "Erro ao salvar os dados.";
	}
} else {
	echo "Erro ao salvar os dados: " . mysqli_error($conn);
}

// fechar a conexão com o banco de dados
mysqli_close($conn);
?>




<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuário</title>
	<link rel="stylesheet" type="text/css" href="css/chatgpt.css">
</head>
<body>
	<div class="container">
		<h2>Cadastro de Usuário</h2>
		<form method="POST" action="salvar.php">
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" required>

			<label for="local">Local:</label>
			<input type="text" id="local" name="local" required>

			<label for="area">Área:</label>
			<input type="text" id="area" name="area" required>

			<label for="estacao">Estação:</label>
			<input type="text" id="estacao" name="estacao" required>

			<input type="submit" value="Enviar">
		</form>
	</div>
</body>
</html>
