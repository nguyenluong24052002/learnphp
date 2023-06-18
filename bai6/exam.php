<html>
    <head>
        <title>Form in PHP</title>
        <style>
            label {
                float: left;
                width: 100px;
            }

            input {
                margin-bottom: 5px;
                padding: 5px;
            }

            input[type="text"], input[type="password"] {
                width: 300px;
            }

            .input-error {
                border: 1px solid red;
            }

            .smg-error {
                color: red;
                text-indent: 100px;
            }
        </style>
    </head>
    <body>
        <?php
            /**
             * Fullname, email, address, phone, password: Bắt buộc nhập
             * Email: check đúng format
             */

            $fullname = $email = $phone = $password = $address = $gender = '';
            $fullnameErr = $emailErr = $phoneErr = $passwordErr = $addressErr = $genderErr = '';
            $content = '';

            if (isset($_POST['btnRegister'])) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $gender = isset($_POST['gender']) ? $_POST['gender'] : '';

                




                // Validate for fullname
                if (empty($fullname)) {
                    $fullnameErr = 'Vui lòng nhập họ và tên';
                }

                // Validate for email
                if (empty($email)) {
                    $emailErr = 'Vui lòng nhập email của bạn';
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    // Kiểm tra format
                    $emailErr = 'Email không đúng định dạng';
                }

                // Validate for phone
                if (empty($phone)) {
                    $phoneErr = 'Vui lòng nhập số điện thoại của bạn';
                } else if (!is_numeric($_POST['phone'])) {
                    // Kiểm tra format
                    $phoneErr = 'Phone không đúng định dạng';
                } else if (strlen($_POST['phone']) > 10) {
                    // Kiểm tra format
                    $phoneErr = 'Phone không đc quá 10 lý tự';
                }


                 // Validate for passwwrd
                 if (empty($password)) {
                    $passwordErr = 'Vui lòng nhập Mật khẩu';
                 };

                
                 // Validate for address
                 if (empty($address)) {
                    $addressErr = 'Vui lòng nhập địa chỉ';
                 };


                 // Validate for gender
                 if (empty($gender)) {
                    $genderErr = 'Vui lòng chọn giới tính';
                }

                    // Xử lý sau khi nhập đúng và đủ
                    if ($fullname && $email && $phone && $address && $password) {
                        echo "<strong>";
                        $content .= "<p>Tên của bạn: ${fullname}";  
                        $content .= "<p>Email của bạn: ${email}";
                        $content .= "<p>Phone của bạn: ${phone}";
                        $content .= "<p>Address của bạn: ${address}";
                        $content .= "<p>Giới Tính của bạn:";
                                if ($gender == '1') {
                                    $content .= "Nam";
                                }else if ($gender == '2') {
                                    $content .= "Nữ";
                                }     

                    }
            }
        ?>
        <form action="" method="post">
            <label>Fullname</label>
            <input type="text" name="fullname" class="<?= $fullnameErr ? 'input-error' : '' ?>" value="<?= $fullname ?>" />
            <?= $fullnameErr ? "<div class='smg-error'>{$fullnameErr}</div>" : '' ?>
            <br/>
            <label>Email</label>
            <input type="text" name="email" class="<?= $emailErr ? 'input-error' : '' ?>" value="<?= $email ?>" />
            <?= $emailErr ? "<div class='smg-error'>{$emailErr}</div>" : '' ?>
            <br/>
            <label>Phone</label>
            <input type="text" name="phone" class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>" />
            <?= $phoneErr ? "<div class='smg-error'>{$phoneErr}</div>" : '' ?>
            <br/>
            <br/>
            <label>Password</label>
            <input type="password" name="password" class="<?= $passwordErr ? 'input-error' : '' ?>" value="<?= $password ?>" />
            <?= $passwordErr ? "<div class='smg-error'>{$passwordErr}</div>" : '' ?>
            <br/>
            <label>Address</label>
            <input type="text" name="address" class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>" />
            <?= $addressErr ? "<div class='smg-error'>{$addressErr}</div>" : '' ?>
            <br/>
            <label>Gender</label>
            Nam <input type="radio" name="gender" value="1" <?= $gender == '1' ? 'checked' : '' ?> />
            Nữ <input type="radio" name="gender" value="2" <?= $gender == '2' ? 'checked' : '' ?> />
            <?= $genderErr ? "<div class='smg-error'>{$genderErr}</div>" : '' ?>
            <br/>

            <label>&nbsp;</label>
            <button name="btnRegister">Register</button>
        </form>

        <div class='result'><?= $content ?></div>
    </body>
</html>