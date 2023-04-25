<?php
$login = $_POST['user_id'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['user_pass']);
$connect = mysql_connect('localhost','','');
$db = mysql_select_db('autoapac');
  if (isset($entrar)) {

    $verifica = mysql_query("SELECT * FROM usuarios WHERE login =
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.html';</script>";
        die();
      }else{
        setcookie("login",$login);
        header("Location:index.php");
      }
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="forms">
        <form class="formulario">
            <h1 class="form_titulo">Faça seu Login</h1>

            <label class="form_label" for="user_id"></label>
            <input class="form_input" type="text" placeholder="Insira seu ID" id="user_id" required>
            <label class="form_label" for="user_pass"></label>
            <input class="form_input" type="password" placeholder="Insira sua Senha" id="user_pass" required>
            <button type="submit" class="button" id="entrar">Entrar</button>
            <img class="form_img" src="assets/Logo apac.png" alt="Logo Apac">
        </form>
    </div>
</body>
</html>