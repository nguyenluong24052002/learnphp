<?php 
    $module = $_GET['module'] ?? null;
    $action = $_GET['action']?? null;   

    switch ($module) {
        case 'product':
            if(!$action) {
                require('./products/list.php');
            }else {
                require("./products/{$action}.php");
            }
            break;

            
            case 'user':
                if(!$action) {
                    require('./user/list.php');
                }else {
                    require("./user/{$action}.php");
                }
                break;
    }

?>