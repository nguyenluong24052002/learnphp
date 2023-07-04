<?php
    $userId = $_GET['id'] ?? null; 
    // Dòng này gán giá trị của tham số id từ URL vào biến $userId.
    // Nếu tham số không tồn tại, thì biến sẽ được gán giá trị null 

    $userInfo = null;  
    // Khởi tạo biến $userInfo với giá trị ban đầu là null. Biến này sẽ lưu trữ thông tin của user.

    if (isset($_POST['btn-submit'])) { 
        $data = $_POST;
        unset($_POST['btn-submit']);
        //Kiểm tra xem có sự kiện submit form có tên btn-submit được gửi đi hay không.

        if (!empty($_SESSION['users'])) {////Kiểm tra xem mảng $_SESSION['users'] có tồn tại và không rỗng.
            $userInfo = end($_SESSION['users']);// không rỗng, thì biến $userInfo sẽ lưu trữ thông tin của user cuối cùng trong mảng bằng cách sử dụng hàm end($_SESSION['users']).
            $id += $userInfo['id'];
        }

        if (!empty($_GET['id'])) { //Kiểm tra xem tham số id từ URL có tồn tại và không rỗng.
            $data['id'] = $_GET['id'];//Trong trường hợp id từ URL không rỗng, thì giá trị của id từ URL sẽ được gán vào $data['id'].

            $keyOfUser = null;
            foreach ($_SESSION['users'] as $key => $user) {
                if ($user['id'] == $_GET['id']) {
                    $keyOfUser = $key;
                    break;  
                }
                
            }//Tiếp theo, một vòng lặp foreach được sử dụng để tìm chỉ mục ($keyOfUser) 
                //của user trong mảng $_SESSION['users'] có giá trị id tương ứng với id từ URL.
                // Nếu tìm thấy, vòng lặp sẽ dừng bằng break


            $_SESSION['users'][$keyOfUser] = $data;
           // Sau đó, phần tử tương ứng trong mảng $_SESSION['users'] 
           //sẽ được cập nhật bằng $data thông qua $keyOfUser.
        }


        if (empty($_GET['id'])) {
            $data['id'] = $id;
            $_SESSION['users'][] = $data;
        }//Nếu id từ URL rỗng (không tồn tại), thì id mới sẽ được gán vào $data['id'],
        // và $data sẽ được thêm vào mảng $_SESSION['users'].
        

        header('location:index.php?module=product');
    }

    foreach ($_SESSION['users'] as $key => $user) {
            //Vòng lặp foreach sẽ lặp qua từng phần tử trong mảng $_SESSION['users'].
            //Biến $key lưu trữ chỉ mục của phần tử, và biến $user lưu trữ giá trị của phần tử đó.

        if ($user['id'] == $userId) {
            //Trong mỗi lần lặp, điều kiện này kiểm tra xem giá trị id của user
            //trong mảng có khớp với giá trị $userId hay không.

            $userInfo = $user;
            //Nếu tìm thấy user có id khớp, 
            //dòng $userInfo = $user;gán giá trị của user đó cho biến $userInfo.
            break;
        }
    }

    if (empty($userInfo)) {
        echo 'User not found!';
        //Nếu $userInfo rỗng, tức là không tìm thấy user có id tương ứng,
        // câu lệnh echo 'User not found!'; được sử dụng để hiển thị thông báo "User not found!".
        exit;
    }
?>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">Add Infomation</h3>
    <a href="index.php?module=product&action=list">Back</a>
</div>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="<?= $userInfo['name'] ?>"/>    
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?= $userInfo['email'] ?>"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" value="<?= $userInfo['phone'] ?>" />
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address" value="<?= $userInfo['address'] ?>" /> 
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
            <label><input type="radio" name="gender" value="1" <?= $userInfo['gender'] == 1 ? 'checked' : '' ?> />Nam</label>
            <label><input type="radio" name="gender" value="2" <?= $userInfo    ['gender'] == 2 ? 'checked' : '' ?> />Nữ</label>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Avatar</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="file" />
                <?php if(!empty($user['file'])):?>
                    <img src="./assets/images/<?= $userInfo['file'] ?>" alt="" width="100">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button type="submit" name="btn-submit" class="btn btn-primary">Save</button> &nbsp;
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>
