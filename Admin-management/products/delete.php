<?php

$userId = $_GET['id'] ?? null; // Dòng này gán giá trị của tham số id từ URL vào biến $userId. Nếu tham số không tồn tại,
                                // thì biến sẽ được gán giá trị null bằng toán tử null coalescing (??)

$checkUserExists = false; // Khởi tạo biến $checkUserExists với giá trị ban đầu là false.
                         // Biến này sẽ được sử dụng để kiểm tra xem user có tồn tại hay không

$keyOfUser = null; // Khởi tạo biến $keyOfUser với giá trị ban đầu là null.
                // Biến này sẽ lưu trữ chỉ mục của user trong mảng $_SESSION['users']

foreach ($_SESSION['users'] as $key => $user) {
    if ($user['id'] == $userId) {
        $checkUserExists = true;
        $keyOfUser = $key;
        break; // Dòng này bắt đầu một vòng lặp foreach qua mảng $_SESSION['users'],
            //trong đó $key là chỉ mục và $user là giá trị tương ứng của mỗi phần tử trong mảng.
    }
}

if (!$checkUserExists) {  // Kiểm tra nếu $checkUserExists vẫn là false, tức là không tìm thấy user,
    echo 'Không tìm thấy User'; //// thì in ra thông báo "Không tìm thấy User" và kết thúc mã bằng exit
    exit;
}

if ($checkUserExists && $keyOfUser >= 0) {
    unset($_SESSION['users'][$keyOfUser]);
    header('location:index.php?module=product');
}//Kiểm tra nếu $checkUserExists là true và $keyOfUser có giá trị không âm (lớn hơn hoặc bằng 0),
 //tức là tìm thấy user và $keyOfUser hợp lệ, thì tiến hành xóa user đó khỏi mảng $_SESSION['users'] bằng unset($_SESSION['users'][$keyOfUser]).
 //Sau đó, chuyển hướng trang đến index.php?module=product bằng header('location:index.php?module=product').


