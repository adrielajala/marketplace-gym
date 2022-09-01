<?php

    session_start();

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
    <title> Cadastre-se - Green Gym </title>

    <link rel="stylesheet" href="../src/css/style-signup.css?2<?= time() ?>">
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

    <?php

        if (isset($_SESSION['emailFail'])) {
            if ($_SESSION['emailFail']) {
                echo '<p class="error-p"> <strong> O e-mail informado já se encontra cadastrado. </strong> </p>';
                unset($_SESSION['emailFail']);
            }
        }

    ?>

    <div id="form-container">
        <form action="../controller/signup.php" method="post">

            <label for="first_name"> <strong> Primeiro Nome: </strong> </label>
            <input type="text" name="first_name" id="" required>

            <br> <br>

            <label for="last_name"> <strong> Segundo Nome: </strong> </label>
            <input type="text" name="last_name" id="" required>

            <br> <br>

            <label for="email"> <strong> E-Mail: </strong> </label>
            <input type="email" name="email" id="" required>

            <br> <br>

            <label for="password"> <strong> Senha: </strong> </label>
            <input type="password" name="password" id="" required>

            <br> <br>

            <label for="cep"> <strong> CEP: </strong> </label>
            <input type="number" name="cep" id="cep" required>

            <br> <br>

            <label for="address"> <strong> Endereço: </strong> </label>
            <input type="text" name="address" id="address" required>

            <br> <br>

            <label for="city"> <strong> Cidade: </strong> </label>
            <input type="text" name="city" id="city" required>

            <br> <br>

            <label for="phone"> <strong> Telefone: </strong> </label>
            <input type="number" name="phone" id="" required>

            <br> <br>

            <label for="birthdate"> <strong> Data de Nascimento: </strong> </label>
            <input type="date" name="birthdate" id="" required>

            <br> <br>

            <button type="submit"> Cadastrar </button>

        </form>


    </div>

    <script src="../src/js/script-signup.js?2<?= time() ?>"> </script>
    
</body>
</html>