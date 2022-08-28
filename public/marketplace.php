<?php

    # inicia a sessão
    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Marketplace - Green Gym </title>

    <!-- CSS e ícone de página -->
    <link rel="stylesheet" href="../src/css/style-mkt.css?2<?= time() ?>">
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

    <nav>
        <div id="logo-container">
            <p> <b> Marketplace </b> </p>
        </div>
    </nav>

    <div id="buttons-container">
        <button id="testes" onclick="window.location.href='marketplace.php?filter=1'">
            Bicicletas
        </button>
        <button onclick="window.location.href='marketplace.php?filter=2'">
            Esteiras
        </button>
        <button onclick="window.location.href='marketplace.php?filter=3'">
            Elípticos
        </button>
        <button onclick="window.location.href='marketplace.php?filter=4'">
            Escadas
        </button>
        <button onclick="window.location.href='marketplace.php?filter=5'">
            Equipamentos
        </button>

        <?php

            # alterar o botão de 'entrar' caso o usuário já esteja logado
            
            if (isset($_SESSION['logged']) && isset($_SESSION['sessionName'])) {
                $name = $_SESSION['sessionName'];
                echo "
                    
                    <button>
                        Bem-vindo, $name!
                    </button>

                    <button onclick='myAccount()'>
                        Acessar minha conta
                    </button>

                    <button onclick='createSell()'>
                        Criar uma Venda
                    </button>

                    <button onclick='logout()'>
                        Sair
                    </button>

                ";
            } else {
                echo "
                    
                    <button onclick='login()'>
                    <i class='fa-solid fa-arrow-right-to-bracket'> </i> Entrar
                    </button>

                ";
            }

        ?>

    </div>
    
    <div id="products-container">

        <?php

            # mostrar os produtos que não estão vendidos

            if (isset($_GET['filter']) && $_GET['filter'] > 5) {

                header('Location: marketplace.php');
                die();

            } else {
    
                if (!isset($_GET['filter'])) {
                    require('../controller/Functions.php');
    
                    $func = new Functions();
            
                    echo $func -> showAllProducts();
                } else {
                    require('../controller/Functions.php');
    
                    $func = new Functions();
    
                    echo $func -> getProducts($_GET['filter']);
                }
    
            }

        ?>
    
    </div>

    <!-- JavaScript -->
    <script src="../src/js/script-mkt.js?2<?= time(); ?>"></script>

</body>
</html>