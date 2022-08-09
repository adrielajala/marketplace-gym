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

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produto - <?= $product; ?> | Green Gym </title>
</head>
<body>
    
</body>
</html>