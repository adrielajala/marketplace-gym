<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Green Gym </title>

    <!-- CSS e ícone de página -->
    <link rel="stylesheet" href="../src/css/style-index.css?2<?= time() ?>">
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
            <p> <b> Green Gym™ </b> </p>
            <p> Equipamentos para Academias </p>
            <!-- <img src="../src/img/logo.jpeg" alt="Logo Green Gym" srcset=""> -->
        </div>

        <div id="buttons-container">
            <!-- botões que aparecem na tela de celular -->
            <!-- colocar botão de 'entrar', 'consultoria' e 'manutenção' :) -->
            <button id="marketplace">
                Marketplace
            </button>
            <button>
                Contato
            </button>
            <button>
                Sobre
            </button>
        </div>
    </nav>

    <nav id="menu">
        <p> Menu </p>
        <div id="buttons-container-menu">
            <button id="menu1" onclick="window.location.href='marketplace.php'">
                Marketplace
            </button>
            <button id="menu1" onclick="window.location.href='marketplace.php'">
                Contato
            </button>
            <button id="menu1" onclick="window.location.href='marketplace.php'">
                Sobre
            </button>
        </div>
    </nav>

    <article>

        <div id="text-container">
            <p> <b> Green Gym - Equipamentos para Academias </b> </p>
            <br>
            <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium voluptates facere nemo labore dolorum in, deserunt nulla sequi quaerat impedit veniam. Tempore doloribus ipsum veniam aperiam consequuntur laboriosam velit nostrum. </p>
        </div>

        <div id="image-container">
            <img src="../src/img/healthy-habit.svg" alt="Imagem de uma pessoa fazendo exercícios" id="image-1">
        </div>

    </article>

    <hr>

    <article>

        <div id="box-container">
            <div id="box-1" class="boxes">
                <i class="fa-solid fa-truck"></i>
                <br> <br>
                <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, maxime vel reiciendis aut voluptates eius sequi. Maiores laboriosam debitis totam incidunt ad quasi magnam neque accusamus error dolore, cupiditate dolor? </p>
            </div>

            <div id="box-2" class="boxes">
                <i class="fa-solid fa-stopwatch"></i>
                <br> <br>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga maiores soluta quibusdam mollitia libero labore in laboriosam, maxime, hic porro veniam minus blanditiis deleniti iusto voluptatibus nisi cupiditate illum ad? </p>
            </div>

            <div id="box-3" class="boxes">
                <i class="fa-brands fa-whatsapp-square"></i>
                <br> <br>
                <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum autem voluptates quasi eligendi nesciunt magni numquam. Consequuntur odio, iusto quas officiis voluptatibus nemo neque maxime veritatis, odit incidunt modi beatae! </p>
            </div>
        </div>

    </article>

    <hr>

    <footer>
        <p> Green Gym - Equipamentos para Academias </p>
    </footer>

    <!-- JavaScript -->
    <script src="../src/js/script-index.js?2"></script>

</body>
</html>