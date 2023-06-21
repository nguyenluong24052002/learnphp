<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form giao hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php
     // Khai báo các biến lưu trạng thái
        $page = isset($_GET['page']) ? $_GET['page'] : 'Laptop';
        $fullname = $phone = $address = '';
        $fullnameErr = $phoneErr = $addressErr = '';
        $content = '';

    // Xử lý khi submit form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

    // Validate form
        if (empty($fullname)) {
            $fullnameErr = 'Vui lòng nhập họ và tên';
        }

    // Validate for phone
    if (empty($phone)) {
        $phoneErr = 'Vui lòng nhập số phone';
    } else if (!is_numeric($_POST['phone'])) {
            $phoneErr = 'Phone không đúng định dạng';
    } else if (strlen($_POST['phone']) > 10) {
            $phoneErr = 'Phone không đc quá 10 lý tự';
    }

    if (empty($address)) {
        $addressErr = 'Vui lòng nhập địa chỉ';
    }
}

    //sử lý sau khi nhập đúng
    if ($fullname && $phone && $address) {
        $content .= "<p>Tên của bạn là: {$fullname}";
        $content .= "<p>Số phone của bạn là: {$phone}";
        $content .= "<p>Địa chỉ nhận hàng: {$address}";
    }

// Các trạng thái của danh mục sản phẩm
$categories = [
    'Laptop' => 'Bạn đang ở trang Laptop',
    'Printer' => 'Bạn đang ở trang Printer',
    'Mobile' => 'Bạn đang ở trang Mobile',
    'Fax' => 'Bạn đang ở trang Fax'
];


?>

<div class="container">
    <div class="list-product">
        <ul>
            <h4>Danh mục sản phẩm</h4>
            <?php foreach ($categories as $category => $description): ?>
            <li><a href="?page=<?= $category ?>"><?= $category ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
                
    <div class="form-list">
        <form action="" method="post"> 
            <h3>Bạn đang ở trang <?= $page ?>, vui lòng nhập thông tin giao hàng</h3>  
            <label>Họ và tên:</label>
            <input type="text" name="fullname" class="<?= $fullnameErr ? 'input-error' : '' ?>" value="<?= $fullname ?>" />
            <?= $fullnameErr ? "<span class='smg-error'>{$fullnameErr}</span>" : '' ?>
            <br/>
            <label>Số điện thoại:</label>
            <input type="text" name="phone" class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>" />
            <?= $phoneErr ? "<span class='smg-error'>{$phoneErr}</span>" : '' ?>
            <br/>
            <label>Địa chỉ nhận hàng:</label>
            <input type="text" name="address" class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>" />
            <?= $addressErr ? "<span class='smg-error'>{$addressErr}</span>" : '' ?>
            <br/>
            <label>&nbsp;</label>
            <button class="save" name="btnRegister">Gửi Đi</button>
        </form>
    </div>
</div>

    <div class='result'><?= $content ?></div>
</body>
</html>





