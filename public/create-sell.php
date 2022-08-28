<?php

    # inicia a sessão
    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location: ../public/login.php');
        die();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Criar venda - Green Gym </title>

    <link rel="stylesheet" href="../src/css/style-crt-sell.css?2<?= time() ?>">
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

    <p class="upload-result"> <strong>
        <?php

            if (isset($_SESSION['prodSuccess'])) {
                if ($_SESSION['prodSuccess']) {
                    echo '<p class="up-success"> Produto cadastrado com sucesso! </p>';
                    unset($_SESSION['prodSuccess']);
                } else {
                    echo '<p class="up-fail"> Houve um erro ao cadastrar o produto! </p>';
                    unset($_SESSION['prodSuccess']);
                }
            } else {
                echo '';
            }
    
            
                    
        ?>

    </strong> </p>

    <div id="form-container">
        <form action="../controller/sell.php" method="post" enctype="multipart/form-data">
            
            <label for="product_name"> <strong> Nome do Produto (Como irá aparecer): </strong> </label>
            <input type="text" name="product_name" id="product_name" required>

            <br> <br> <br>

            <label for=""> <strong> Categoria do Produto: </strong> </label>

            <br> <br>

            <label for="bicicleta" class="radio-label"> Bicicleta </label>
            <input type="radio" name="category" id="bicicleta" class="radio-inputs" value="1" required>

            <br>

            <label for="esteira" class="radio-label"> Esteira </label>
            <input type="radio" name="category" id="esteira" class="radio-inputs" value="2" required>

            <br>

            <label for="eliptico" class="radio-label"> Elíptico </label>
            <input type="radio" name="category" id="eliptico" class="radio-inputs" value="3" required>

            <br>

            <label for="escada" class="radio-label"> Escada </label>
            <input type="radio" name="category" id="escada" class="radio-inputs" value="4" required>

            <br>

            <label for="equipamento" class="radio-label"> Equipamento </label>
            <input type="radio" name="category" id="equipamento" class="radio-inputs" value="5" required>

            <br>

            <label for="acessorio" class="radio-label"> Acessório </label>
            <input type="radio" name="category" id="acessorio" class="radio-inputs" value="6" required>

            <br> <br> <br>

            <label for="brand"> <strong> Marca (Se não souber, coloque um "-"): </strong> </label>
            <input type="text" name="brand" id="brand" required>

            <br> <br> <br>

            <label for=""> <strong> Condição do Produto: </strong> </label>

            <br> <br>

            <label for="excelente" class="radio-label"> Novo </label>
            <input type="radio" name="condition" id="excelente" class="radio-inputs" value="Novo" required>

            <br>

            <label for="bom" class="radio-label"> Semi-novo </label>
            <input type="radio" name="condition" id="bom" class="radio-inputs" value="Semi-novo" required>

            <br>

            <label for="regular" class="radio-label"> Usado </label>
            <input type="radio" name="condition" id="regular" class="radio-inputs" value="Usado" required>

            <br> <br> <br>

            <label for="description"> <strong> Descrição: </strong> </label>
            <input type="text" name="description" id="description" required>

            <br> <br> <br>

            <label for="price"> <strong> Preço (R$): </strong> </label>
            <input type="number" name="price" id="price" required>

            <br> <br> <br>

            <label for="photos"> <strong> Fotos do Produto: </strong> </label>
            <a id="photos-btnx"> <i class="fa-solid fa-cloud-arrow-up"></i> Enviar Fotos </a>
            <input type="file" name="photos[]" id="photos-btn" onchange="getFileData(this)" multiple>

            <br> <br> <br>

            <center> <button type="submit" id="submit-sell"> <i class="fa-solid fa-circle-plus"></i> Criar Venda </button> </center>


        </form>
    </div>

    <script src="../src/js/script-sell.js?2<?= time() ?>"></script>
    
</body>
</html>