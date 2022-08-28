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
    <title> Minha Conta - Green Gym </title>

    <!-- CSS e ícone de página -->
    <link rel="stylesheet" href="../src/css/style-myaccount.css?2<?= time() ?>">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">

</head>
<body>

    <nav>
        <div id="logo-container">
            <p> <b> Minha Conta </b> </p>
        </div>
    </nav>

    <div id="account-container">

        <p> <?= strtoupper($_SESSION['sessionName']); ?> </p>

        <hr>

        <?php /*

        <br>

        <div style="overflow-x: auto">

            <table id="account-table">

                <tr>
                    <td> <b> Nome Completo: </b> </td>
                    <td> <b> E-Mail: </b> </td>
                    <td> <b> Data de Nascimento: </b> </td>
                    <td> <b> Conta Criada Em: </b> </td>
                </tr>

                <tr>
                    <td> <?= strtoupper($_SESSION['sessionName']); ?> </td>
                    <td> <?= $func -> getInfo($_SESSION['sessionId'], 'email'); ?> </td>
                    <td> <?= date_format(date_create($func -> getInfo($_SESSION['sessionId'], 'date_birth')), 'd/m/Y'); ?> </td>
                    <td> <?= date_format(date_create($func -> getInfo($_SESSION['sessionId'], 'created_at')), 'd/m/Y'); ?> </td>
                </tr>

            </table>

        </div> */ ?>

    </div>

    <br> <br>

    <div id="my-sells-container">
        <div id="active-sells-counter">

            <p> Atualmente, você possui: </p>

            <br>

            <p> <?= $sellCount; ?> </p>

            <br>

            <p> vendas ativas. </p>

        </div>

        <div id="edit-active-sells">
            <p> Editar Vendas Ativas </p>

            <br>

            <a href="#"> <i class="fa-solid fa-pencil"></i> </a>

            <br>
        </div>
    </div>

    


    <?php /*

    <div id="user-sells-and-buys">
        <p> Minhas Vendas </p>

        <hr>

        exibe todas as rows do banco de dados caso o usuário tenha vendas; caso não, exibe a mensagem que o usuário não tem vendas -->
        <?php 
        
            if ($sells -> rowCount() > 0) {

                # contador pra facilitar a exibição de quantas vendas o usuário já fez
                $i = 1;

                while ($dados = $sells -> fetch(PDO::FETCH_ASSOC)) {

                    $productName = $dados['product_name'];
                    $category = $dados['category'];
                    $condition = $dados['condition_of'];
                    $price = $dados['price'];
                    $dateOfPosting = date_format(date_create($dados['date_of_posting']), 'd/m/Y');
                    

                    echo "

                        <br> <br>

                        <div style='overflow-x: auto'>
                    
                        <table id='sells-table'>

                            <tr>

                                <th> <b> Produto Nº </b> <br> <br> </th>
                                <th> <b> Produto: </b> <br> <br> </th>
                                <th> <b> Categoria: </b> <br> <br> </th>
                                <th> <b> Condição do Produto: </b> <br> <br> </th>
                                <th> <b> Preço: </b> <br> <br> </th>
                                <th> <b> Data de Anúncio: </b> <br> <br> </th>

                            </tr>
                        
                            <tr>

                                <td> $i </td>
                                <td> $productName </td>
                                <td> $category </td>
                                <td> $condition </td>
                                <td> R$ $price </td>
                                <td> $dateOfPosting </td>

                            </tr>

                        </table>

                        <br>

                        </div>


                        <hr id='hr-box'>
                    ";

                    $i++;

                }

            } else {

                echo "

                    <br>
                
                    <div class='sells-box'>

                        Atualmente, você não possui vendas.

                    </div>
                
                ";

            }

        ?>
    </div> */ ?>


    <!-- JavaScript -->
    <script src="../src/js/script-myaccount.js?2<?= time(); ?>"></script>
    
</body>
</html>