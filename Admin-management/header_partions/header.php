<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Vue Mini Project</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="index.php?module=product">Product management</a>
      <a class="p-2 text-dark" href="index.php?module=user">User management</a>
    </nav>
    <a class="btn btn-outline-primary" routerlink="cart"><?= $_SESSION['admin']['name'] ?? null ?></a>
    <?php if(!empty($_SESSION['admin'])): ?>
    <a href="index.php?module=auth&action=logout">Logout</a>  
    <?php endif; ?>
  </div>