 <?php
    require './connectdb.php';
 ?>   
<router-outlet></router-outlet>
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
    <h2 class="display-4">Danh Sách Sinh Viên</h2>
    <p><a href="./add.php">Thêm Sinh Viên</a></p>
  </div>

  <div class="container">
    <div class="card-deck mb-3 text-center">
      <table class="table table-bordered">
      <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>    
          </tr>
        </thead> 
        <tbody>
            <?php
                $query = $pdo->query("SELECT * FROM `user`");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
                <a href="./edit.php?id=<?php echo $row['id']?>">Edit</a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa không!')" href="./delete.php?id=<?php echo $row['id']?>">Delete</a>
            </td>
          </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>
