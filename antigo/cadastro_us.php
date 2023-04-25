<?php
$nome = "";
$senha = "";
$telefone = "";
$permissao = "";
$msg = "Tese";

if(isset($_POST["nome"],$_POST["senha"],$_POST["telefone"],$_POST["permissao"])){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=autoapac", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Ocorreu um erro inesperado. Tente novamente mais tarde!";
        exit();
      }
    }

    $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_ENCODED);
    $telefone = filter_input(INPUT_POST,"telefone",FILTER_SANITIZE_NUMBER_INT);
    $permissao = filter_input(INPUT_POST,"permissao",FILTER_SANITIZE_STRING);

    if(!$nome || !$senha || !$telefone || !$permissao){
        $msg = "Dados inválidos";

    }else{
        $stm = $conn->prepare('INSERT INTO pessoas(nome,senha,telefone,permissao)VALUES(:nome,:senha,:telefone,:permissao)');
        $stm->bindValue('nome', $nome, PDO::PARAM_STR);
        $stm->bindValue('senha', $senha, PDO::PARAM_STR);
        $stm->bindValue('telefone', $telefone, PDO::PARAM_INT);
        $stm->bindValue('permissao', $permissao, PDO::PARAM_STR);
        $stm->execute();
        $msg = "Dados enviados com sucesso!";
    }


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <link rel="stylesheet" href="css/cadastro_us.css">
</head>
<body>
    <main>
        <div class="forms">
            <form method="POST" class="formulario">
                <h1 class="form_titulo">Criar Usuário</h1>

                <label class="form_label" for="nome"></label>
                <input class="form_input" type="text" placeholder="Nome Completo" name="nome" required>
                <label class="form_label" for="senha"></label>
                <input class="form_input" type="password" placeholder="Crie uma Senha" name="senha" required>
                <label class="form_label" for="telefone"></label>
                <input class="form_input" type="tel" placeholder="Número de Telefone" name="telefone" required>
                <label for="permissao">Escolha a permissão:</label>
                <select class="form-select" aria-label="Default select example" name="permissao" id="permissao" required>
                    <option selected></option>
                    <option value="nivel_rio">Nível do Rio</option>
                    <option value="Volume da Chuva">Volume da Chuva</option>
                    <option value="Nível do Reservatório">Nível do Reservatório</option>
                    <option value="Todos os campos">Todos os campos</option>
                </select>
                <button type="submit" class="button">Criar usuário</button>
                <img class="form_img" src="assets/Logo apac.png" alt="Logo Apac">
            </form>
            <?=$msg?>
        </div>
    </main>
</body>
</html>