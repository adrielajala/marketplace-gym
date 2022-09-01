<?php

    session_start();

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cep = $_POST['cep'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];

    # impede que a página seja acessada sem autorização
    if (!isset($firstName)) {
        header('Location: ../public/login.php');
        die();
    }

    require('../controller/Functions.php');
    
    $func = new Functions();
    $func -> newUser($firstName, $lastName, $email, $password, $cep, $address, $city, $phone, $birthdate);

?>