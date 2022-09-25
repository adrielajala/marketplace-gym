<?php

    session_start();

    # caso o usuário não esteja logado, redireciona para a página de login
    if (!isset($_SESSION['logged'])) {
        header('Location: login.php');
        die();
    }

    $pToConfirm = $_GET['product'];
    $sellerId = $_SESSION['sessionId'];

    require_once('../db/connection.php');
    $sameSeller = $conn -> prepare('SELECT * FROM products WHERE url_link = ? AND seller_id = ?');
    $sameSeller -> bindParam(1, $pToConfirm);
    $sameSeller -> bindParam(2, $sellerId);
    $sameSeller -> execute();

    if ($sameSeller -> rowCount() == 1) {
        
        $confirmQuery = $conn -> prepare('UPDATE products SET sold = "1" WHERE url_link = ?');
        $confirmQuery -> bindParam(1, $pToConfirm);

        if ($confirmQuery -> execute()) {
            if (!isset($_SESSION['sellConfirmed'])) {
                $_SESSION['sellConfirmed'] = TRUE;
                header('Location: ../public/edit-sales.php');
            }
        } else {
            if (!isset($_SESSION['sellConfirmed'])) {
                $_SESSION['sellConfirmed'] = FALSE;
                header('Location: ../public/edit-sales.php');
            }
        }

    } else {
        header('Location: ../public/edit-sales.php');
    }

?>