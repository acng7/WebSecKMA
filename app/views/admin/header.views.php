<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="public/css/header.css">
<div id="container">
<nav class="navbar navbar-expand-lg" style="background-color:grey">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?type=home">
    <?php
    $roleNames = [
        1 => 'TRANG ADMIN',
        2 => 'TRANG BIÊN TẬP',
        3 => 'TRANG TÁC GIẢ'
    ];
    $roleId = $_SESSION['user']['role_id'] ?? 3;
    echo '<strong>'.e($roleNames[$roleId] ?? 'TRANG TÁC GIẢ').'</strong>';
    ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            QUẢN LÝ
          </a>
          <ul class="dropdown-menu">
            <?php if(hasAnyRole([1, 2])): ?>
              <li><a class="dropdown-item" href="index.php?type=cate">Quản lý thể loại</a></li>
              <li><a class="dropdown-item" href="index.php?type=post">Quản lý bài viết</a></li>
            <?php endif; ?>
            <?php if(hasRole(1)): ?>
              <li><a class="dropdown-item" href="index.php?type=user">Quản lý người dùng</a></li>
            <?php endif; ?>
            <?php if(hasRole(3)): ?>
              <li><a class="dropdown-item" href="index.php?type=postself">Quản lý bài viết</a></li>
            <?php endif; ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= e($_SESSION['user']['userName']) ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?logout=1">Đăng xuất</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
