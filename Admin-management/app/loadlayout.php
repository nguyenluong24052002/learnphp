<?php 
    $module = $_GET['module'] ?? null;
    $action = $_GET['action']?? null;   


    if ($module != 'auth' && empty($_SESSION['admin'])) {
        header('location:index.php?module=auth&action=login');
    }
    
    if ($action == 'login' && !empty($_SESSION['admin'])) {
        header('location:index.php?module=product');
    }
    

    switch ($module) {
        case 'product':
            if(!$action) {
                require './products/list.php';
            }else {
                require "./products/{$action}.php";
            }   

            break;

            
            case 'user':
                if(!$action) {
                    require './user/list.php';
                }else {
                    require "./user/{$action}.php";
                }
                break;    
               

            case 'auth':
                if ($action == 'login') {
                    require './auth/process_login.php';
                    require './auth/login.php';
                }
        
                if ($action == 'logout') {
                    require './auth/logout.php';
                }
        
                break;    
                
    }

?>