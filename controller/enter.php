<?php

    require_once('../controller/Functions.php');

    $func = new Functions();

    $email = $_POST['email'];
    $password = $_POST['password'];

    # senha de teste é 12345

    if ($func -> authenticate($email, $password)) {
        header('Location: ../public/marketplace.php');
    } else {
        $_SESSION['loginFail'] = TRUE;
        header('Location: ../public/login.php');
        die();
    }

?>