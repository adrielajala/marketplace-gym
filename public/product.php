<?php

    # inicia a sessão
    session_start();

    $isLogged;

    # verifica se o usuário está logado e, se estiver, altera alguns elementos da página
    if (isset($_SESSION['logged'])) {
        $isLogged = TRUE;
    } else {
        $isLogged = FALSE;
    }

    ### pegar o nome do produto
    require_once('../controller/Functions.php');
    $func = new Functions();
    $product = $func -> productInfo('product_name', $_GET['p']);

    ### pegando informações do vendedor
    require_once('../controller/Functions.php');
    $func = new Functions();
    $sellerId = $func -> productInfo('seller_id', $_GET['p']);

    $sellerPhone = $func -> getInfo($sellerId, 'phone');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produto - <?= $product; ?> | Green Gym </title>

    <link rel="stylesheet" href="../src/css/style-product.css?2<?= time() ?>">
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
            <p> <b> Marketplace - Produto </b> </p>
        </div>
    </nav>

    <div id="product-container">

        <div id="product-container-image">
            <!-- colocar o código php pra pegar a imagem da pasta de uploads -->
            <img src="../src/img/esteira.jpg" alt="" srcset="">
        </div>

        <div id="product-container-text">
            <p> <strong> <?= $func -> productInfo('product_name', $_GET['p']) ?> </strong> </p>
            <br>
            <p> R$ <?= $func -> productInfo('price', $_GET['p']) ?> </p>

            <hr>

            <br> <br>
            <p> <?= $func -> productInfo('description', $_GET['p']) ?> </p>

            <br> <br> <br>

            <?php

                if ($isLogged) {
                    echo "
                    
                        <a href='https://api.whatsapp.com/send?phone=55$sellerPhone' target='_blank'> <button> <i class='fa-brands fa-whatsapp'></i> Conversar com o Vendedor </button> </a>
                    
                    ";
                } else {
                    echo '<button> Faça login para entrar em contato com o vendedor! </button>';
                }

            ?>
        </div>

    </div>

    <br> <br>


    
</body>
</html>