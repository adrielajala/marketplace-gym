<?php

    session_start();

    # caso o usuário não esteja logado, redireciona para a página de login
    if (!isset($_SESSION['logged'])) {
        header('Location: login.php');
        die();
    }

    # cria o objeto das funções para serem usadas para exibirem as informações do usuário
    require('../controller/Functions.php');
    $func = new Functions();

    # $sells = $func -> getSells($_SESSION['sessionId']);
    $sellCount = $func -> sellCounter($_SESSION['sessionId']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar Vendas - Green Gym </title>

    <!-- CSS e ícone de página -->
    <link rel="stylesheet" href="../src/css/style-editsales.css?2<?= time() ?>">
    <link rel="icon" type="image/x-icon" href="../src/img/icon.svg">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Faustina&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css">

</head>
<body>

    <nav>
        <div id="logo-container">
            <p> <b> Minhas Vendas </b> </p>
        </div>
    </nav>

    <p class="op-result"> <strong>
        <?php

            if (isset($_SESSION['sellConfirmed'])) {
                if ($_SESSION['sellConfirmed']) {
                    echo '<p class="sell-success"> Venda confirmada com sucesso! </p>';
                    unset($_SESSION['sellConfirmed']);
                } else {
                    echo '<p class="sell-fail"> Houve um erro ao confirmar a venda! </p>';
                    unset($_SESSION['sellConfirmed']);
                }
            } else {
                echo '';
            }

            if (isset($_SESSION['deleteConfirmed'])) {
                if ($_SESSION['deleteConfirmed']) {
                    echo '<p class="sell-success"> Venda deletada com sucesso! </p>';
                    unset($_SESSION['deleteConfirmed']);
                } else {
                    echo '<p class="sell-fail"> Houve um erro ao deletar a venda! </p>';
                    unset($_SESSION['deleteConfirmed']);
                }
            } else {
                echo '';
            }
                    
        ?>
    </strong> </p>


    <div id="sells-container">

        <?php

            $func -> getUserSells($_SESSION['sessionId']);

        ?>

    </div>

    
</body>
</html>