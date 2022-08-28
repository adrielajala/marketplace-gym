<?php

    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location: ../public/login.php');
        die();
    }

    $productName = $_POST['product_name'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $productCondition = $_POST['condition'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $folder = '../uploads/';
    $name = '';
    $userId = $_SESSION['sessionId'];
    $count = count($_FILES['photos']['name']);

    require_once('Functions.php');
    $func = new Functions();

    $func -> newSell($userId, $productName, $category, $productCondition, $brand, $description, $price);


    for ($i = 0; $i < $count; $i++) {
        $formats = array('jpg', 'jpeg', 'png');
        $fileXtension = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
    
        # echo 'extensão:' . $fileXtension;
    
        if (in_array($fileXtension, $formats)) {

            require('../db/connection.php');

            $photoId = $conn -> prepare('SELECT photo_id FROM products_photos ORDER BY photo_id DESC LIMIT 1');
            $photoId -> execute();
            $fetch = $photoId -> fetch(PDO::FETCH_ASSOC);
            $phId = $fetch['photo_id'];

            $phId2 = $phId + 1; // id da foto que é pra ir na database e no nome do arquivo

            ##########

            $prodId = $conn -> prepare('SELECT product_id FROM products ORDER BY product_id DESC LIMIT 1');
            $prodId -> execute();
            $fetch2 = $prodId -> fetch(PDO::FETCH_ASSOC);
            $prId = $fetch2['product_id'];

            $prId2 = $prId; // id do produto pra por na foto

            ##########

            $tmpName = $_FILES['photos']['tmp_name'][$i];
            $folderDB = $folder . $phId2 . '.' . $fileXtension;

            if (move_uploaded_file($tmpName, $folder . $phId2 . '.' . $fileXtension)) {
                # query pra add a foto na tabela das fotos
                $addQ = $conn -> prepare('INSERT INTO products_photos(photo_owner, product_id, photo_path) VALUES(?, ?, ?)');
                $addQ -> bindParam(1, $userId);
                $addQ -> bindParam(2, $prId2);
                $addQ -> bindParam(3, $folderDB);

                if ($addQ -> execute()) {
                    echo 'ADICIONADO COM SUCESSO!';
                } else {
                    echo 'HOUVE UM ERRO AO ADICIONAR AS FOTOS';
                }
            }

        } else {
            echo 'invalido';
        }
    }


    # echo $productName, $category, $brand, $productCondition, $description, $price;

?>