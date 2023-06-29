<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h2 class="display-4">Product Management</h2>
    <p><a href="index.php?module=product&action=add">Add new</a></p>
  </div>

  <div class="container">
    <div class="card-deck mb-3 text-center"> 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Hành Động</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($_SESSION['users']) ?? null): ?>
          <?php foreach($_SESSION['users'] as $user ):?>
          <tr>
            <td><?= $user['id']?></td>
            <td><?= $user['name']?></td>
            <td><?= $user['email']?></td>
            <td><?= $user['phone']?></td>
            <td><?= $user['address']?></td>
            <td><?= $user['gender'] == 1 ? 'Nam' : 'Nữ'?></td>
            <td>
                <a href="index.php?module=product&action=edit&id=<?= $user['id'] ?>">Edit</a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa không!')" href="index.php?module=product&action=delete&id=<?= $user['id'] ?>">Delete</a>
            </td>
          </tr>
          <?php endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>