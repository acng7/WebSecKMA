<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<header>
  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: black;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample01">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white active" href="index.php?type=home">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              Danh mục
            </a>
            <ul class="dropdown-menu">
              <?php foreach ($getAllCategory as $cate): ?>
                <li>
                  <a class="dropdown-item" href="index.php?type=cate&id=<?= e($cate['id_post_category']) ?>">
                    <?= e($cate['nameCategory']) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
          <?php if(isLoggedIn()): ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="#"><?= e($_SESSION['user']['userName']) ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?logout=1">Đăng xuất</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?type=login">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="index.php?type=regis">Đăng ký</a>
            </li>
          <?php endif; ?>
        </ul>
        <form class="d-flex" action="index.php?type=search" method="post" role="search">
          <input type="hidden" name="csrf_token" value="<?= e(generateCsrfToken()) ?>">
          <input class="form-control me-2" type="text" name="search" placeholder="Search" maxlength="255" required>
          <button class="btn btn-outline-light" type="submit" name="btn-search">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <?php
  $showBanner = !isset($_GET['type']) || 
                (isset($_GET['type']) && !in_array($_GET['type'], ['login', 'regis', 'detail']));
  
  if($showBanner):
  ?>
  <div class="p-5 text-center bg-image" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLsxYQncjgVR6iwLSBeWxhGPVKsB_fCGQU0A&s'); height: 400px; margin-top: 58px;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">TRANG TIN TỨC</h1>
          <h4 class="mb-3">2024</h4>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</header>
