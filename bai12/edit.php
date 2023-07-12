<?php
    require './connectdb.php';
?>

<?php
    if (isset ($_GET['id'])) {
       $id = $_GET['id'];
    }
?>


<?php 
    $sql = "SELECT * FROM user WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
?>

<?php
 
    $name = $email = $phone = $address = '';
    $nameErr = $emailErr = $phoneErr = $addressErr =  '';

    if(isset($_POST['btn-edit'])) {
        // Lấy thông tin từ form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
    
        // Kiểm tra và xử lý lỗi nhập liệu
        if (empty($name)) {
            $nameErr = 'Vui lòng nhập họ tên !';
        }
    
        if (empty($email)) {
            $emailErr = 'Vui lòng nhập email !';
        }
    
        if (empty($phone)) {
            $phoneErr = 'Vui lòng nhập số điện thoại!';
        }
    
        if (empty($address)) {
            $addressErr = 'Vui lòng nhập địa chỉ!';
        }
        
        // Nếu không có lỗi nhập liệu, thực hiện cập nhật
        if ($name != "" && $email != "" && $phone != "" && $address != "") {
            $sql = "UPDATE user SET name = :name, email = :email, phone = :phone, address = :address WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'id' => $id]);
            header('location:index.php');
            return;
        }
    }
    
?>

<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
  <title>suntech.edu.vn</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" >
</head>

<body>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5">Add Student</h3>
    <a href="./index.php">Back </a>
</div>

    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>   
            </div>
        </div>


        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Phone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>" />
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label" >Address</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="address"value="<?php echo $row['address'];?>"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button type="submit" name="btn-edit" class="btn btn-primary">Save</button> &nbsp;
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
    </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>
