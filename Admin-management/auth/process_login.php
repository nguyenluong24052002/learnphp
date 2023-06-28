<?php

$email = $password = '';
$emailErr = $passwordErr = $generalMessage = '';


if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!$email) {
        $emailErr = 'Vui lòng nhập email';
    }

    if(!$password) {
        $passwordErr = 'vui lòng nhập mật khẩu';;
    }
    
    if($email && $password) {
        if($email === 'nguyenluong24052002@gmail.com' && $password === '123321') {
            $_SESSION['admin'] = [
                'email' => $email,
                'name' => 'Nguyễn Lượng',
            ];

            header('location:index.php?module=product');
        }
    }
}