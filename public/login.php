<?php

    # inicia a sessão
    session_start();

    # caso o usuário já esteja logado, redireciona para a tela inicial do marketplace
    if (isset($_SESSION['logged'])) {
        header('Location: marketplace.php');
        die();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - Green Gym </title>

    <!-- CSS e ícone de página -->
    <link rel="stylesheet" href="../src/css/style-login.css?2<?= time() ?>">
    <link rel="icon" type="image/x-icon" href="../src/img/icon.svg">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Faustina&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">

</head>
<body>

    <div id="login-container">
        <p> <b> Login </b> </p>

        <form action="../controller/enter.php" method="post">

            <center> 

            <input type="text" name="email" id="" placeholder="E-mail" required>

            <input type="password" name="password" id="" placeholder="Senha" required>

            <button type="submit"> Entrar </button>

        </form>

        <button type="reset"> Cadastrar-se </button>

        </center>
    </div>

    <!-- JavaScript -->
    <script src="../src/js/script-login.js?2"></script>
    
</body>
</html>