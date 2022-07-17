<?php

    session_start();

    require_once('../controller/Functions.php');

    $func = new Functions();

    $func -> logout();
    die();

?>