<?php
    $idUser = $_GET['id'] ?? null;
    $userCheckexit = false;
    $keyOfuser = null;

    foreach ($_SESSION['users'] as $key => $user) {
        if ($user['id'] == $idUser) {
            $userCheckexit = true;
            $keyOfuser = $key;
            break;
        }
    }

    if ($userCheckexit && $keyOfuser >= 0) {
        unset($_SESSION['users'][$keyOfuser]);
        header('location:index.php?module=product');
    }
    
?>