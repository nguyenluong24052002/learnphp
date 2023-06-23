<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$students = [
  [
    'id' => 1,
    'name' => 'Nguyễn Văn Lượng',
    'email' => 'nguyenluong@gmail.com',
    'address' => 'Hà Nội',
    'gender' => 1, // 1: nam, 2: nữ
  ],
  [
   'id' => 2,
   'name' => 'Trần Thanh Hải',
   'email' => 'tranhai@gmail.com',
   'address' => 'Vĩnh Phúc',
   'gender' => 2, // 1: nam, 2: nữ
  ],
  [
   'id' => 3,
   'name' => 'Vũ Minh Đức',
   'email' => 'minhduc@gmail.com',
   'address' => 'Hồ Chí Minh',
   'gender' => 1, // 1: nam, 2: nữ
  ],
  [
   'id' => 4,
   'name' => 'Nguyễn Văn Thịnh',
   'email' => 'thinhnguyen@gmail.com',
   'address' => 'Hải Dương',
   'gender' => 1, // 1: nam, 2: nữ
  ],
  [
   'id' => 5,
   'name' => 'Nguyễn Ngọc Anh',
   'email' => 'ngocanh@gmail.com',
   'address' => 'Việt Nam',
   'gender' => 2, // 1: nam, 2: nữ
  ],
  [
   'id' => 6,
   'name' => 'Trần Mạnh Dũng',
   'email' => 'manhdung@gmail.com',
   'address' => 'Bạc Liêu',
   'gender' => 1, // 1: nam, 2: nữ
  ],
];

//lấy giá trị keyword và giới tính nếu có
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';

//tạo mảng mới chứa kết quả tìm kiếm
$searchResult = [];

if(!empty($keyword)) {
  foreach ($students as $student) {
    if(
      (stripos($student['name'], $keyword) !== false ||
      stripos($student['email'], $keyword) !== false ||
      stripos($student['address'], $keyword) !== false) &&
      (empty($gender) || $student['gender'] == $gender)
    ){
      $searchResult[] = $student;
    }
  }
}

//tính số lượng sinh viên
 $numberStudents = !empty($searchResult) ? count($searchResult) : count($students);

?>

<!-- tạo form tìm kiếm  -->

<form  method="get">
  <div>
    <label for="keyword">Tìm kiếm:</label>
    <input type="text" name="keyword" id="keyword" value="<?= $keyword ?>" placeholder="Nhập từ khoá tìm kiếm">

    <label for="gender1">Nam</label>
    <input type="radio" name="gender" id="gender1" value="1" <?= isset($_GET['gender']) && $_GET['gender'] == '1' ? 'checked' : '' ?>>
    
    <label for="gender2">Nữ</label>
    <input type="radio" name="gender" id="gender2" value="2" <?= isset($_GET['gender']) && $_GET['gender'] == '2' ? 'checked' : '' ?>>

    <button type="submit">Tìm kiếm</button>
  </div>
</form>

<div class="container">
  <h4>Tổng số sinh viên <?= $numberStudents ?></h4>

  <table width="800" border="1" cellspacing="0" cellpadding="0" >
    <thead>
      <tr>
        <th >ID</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
        <th>Hành động</th>
      </tr>
    </thead>
      <?php foreach (!empty($searchResult) ? $searchResult : $students as $student): ?>
        <tr>
          <td><?= $student['id'] ?></td>
          <td><?= $student['name'] ?></td>
          <td><?= $student['email'] ?></td>
          <td><?= $student['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
          <td><?= $student['address'] ?></td>
          <td>
            <a href="">Xem chi tiết</a>
          </td>
        </tr>
      <?php endforeach; ?>
  </table>
</div>
</body>
</html>