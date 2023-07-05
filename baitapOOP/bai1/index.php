<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập OOP </title>
        <style>
            body {
                margin: 0px;
                padding: 0px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                width: 500px;
            }

            .form-item {
                margin-bottom: 10px;
            }

            label {
                display: inline-block;
                width: 100px;
            }

            button {
                margin-top: 10px;
                border:none;
            }

            .btn-submit{
                background-color: #1473e6;
            }

            .btn-cancer {
                background-color: #f05123;
            }
    </style>
</head>
<body>
    <?php require_once('student.php') ?>
    <div class="container">
        <h1>Thông tin sinh viên</h1>
        <form action="" method="POST">
            <div class="form-item">
                <label>Họ và tên: </label>
                <input type="text" name="fullName"> 
                <?php if ($fullnameErr): ?>
                    <span class="error" style="color:red"><?= $fullnameErr ?></span>
                <?php endif; ?>    
            </div>

            <div class="form-item">
                <label>Email: </label>
                <input type="text" name="email">
                <?php if ($emailErr):?>
                    <span class="error" style="color:red"><?= $emailErr ?></span>
                <?php endif;?>
            </div>

            <div class="form-item">
                <label>Điện thoại: </label>
                <input type="text" name="phone">
                <?php if ($phoneErr):?>
                    <span class="error" style="color:red"><?= $phoneErr ?></span>
                <?php endif;?> 
            </div>

            <div class="form-item">
                <label>Giới tính: </label>
                <label><input type="radio" name="gender" value="1" <?= $student->getGender() == 1 ? 'checked' : '' ?>>Nam</label>
                <label><input type="radio" name="gender" value="2" <?= $student->getGender() == 2 ? 'checked' : '' ?>>Nữ</label>
                <?php if ($genderErr):?>
                    <span class="error" style="color:red"><?= $genderErr ?></span>
                <?php endif;?>

            </div>

            <button class="btn-submit" name="btn-submit">Lưu lại</button>
            <button class="btn-cancer" name="btn-cancer">Hủy</button>
        </form>
        <div class="content">
            <p> Họ và tên: <?= $student->getName()?></p>
            <p> Email: <?= $student->getEmail()?></p>
            <p> Điện thoại: <?= $student->getPhone()?></p>
            <p> Giới tính: <?= $student->getGender() == 1 ? 'Nam' : 'Nữ'?></p>
        </div>
    </div>
</body>
</html>