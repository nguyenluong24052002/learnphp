<?php
    require './connectdb.php';

    if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Thực hiện truy vấn xóa trong cơ sở dữ liệu
    $sql = "DELETE FROM user WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);

    // Chuyển hướng trang sau khi xóa thành công
    header("Location: index.php");
    exit();
    }

?>