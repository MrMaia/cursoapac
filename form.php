<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: index.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="forms">
        <form class="formulario">
            <h1 class="form_titulo">Preencha os Dados</h1>

            <label class="form_label" for="nivel_rio"></label>
            <input class="form_input" type="text" placeholder="Insira o nível do rio" id="user_id" required>
            <label class="form_label" for="volume_chuva"></label>
            <input class="form_input" type="text" placeholder="Insira o volume da chuva" id="user_pass" required>
            <label class="form_label" for="nivel_reservatorio"></label>
            <input class="form_input" type="text" placeholder="Insira o nível do reservatório" id="user_pass" required>
            <button type="submit" class="button">Enviar</button>
            <img class="form_img" src="assets/Logo apac.png" alt="Logo Apac">
        </form>
    </div>
</body>
</html>