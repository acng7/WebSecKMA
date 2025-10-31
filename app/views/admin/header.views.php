<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="public/css/header.css">
<div id="container">
<nav class="navbar navbar-expand-lg" style="background-color:grey">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?type=home">
    <?php
            if($_SESSION['user']['role_id']==1){
              echo'
              <strong>TRANG ADMIN</strong>
              ';
            }else if($_SESSION['user']['role_id']==2){
              echo'
              <strong>TRANG BIÊN TẬP</strong>
              ';
            }else if($_SESSION['user']['role_id']==3){
              echo'
              <strong>TRANG TÁC GIẢ</strong>
              ';
            }else{
              echo'
              <strong>TRANG TÁC GIẢ</strong>
              ';
            }
            ?>
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        </li>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            QUẢN LÝ
          </a>
          <ul class="dropdown-menu">
            <?php
            if($_SESSION['user']['role_id']==1){
              echo'
              <li><a class="dropdown-item" href="index.php?type=cate">Quản lý thể loại</a></li>
            <li><a class="dropdown-item" href="index.php?type=post">Quản lý bài viết</a></li>
            <li><a class="dropdown-item" href="index.php?type=user">Quản lý người dùng</a></li>
              ';
            }else if($_SESSION['user']['role_id']==2){
              echo'
              <li><a class="dropdown-item" href="index.php?type=cate">Quản lý thể loại</a></li>
            <li><a class="dropdown-item" href="index.php?type=post">Quản lý bài viết</a></li>
              ';
            }else if($_SESSION['user']['role_id']==3){
              echo'
            <li><a class="dropdown-item" href="index.php?type=postself">Quản lý bài viết</a></li>
              ';
            }else{
              echo'
              <li><a class="dropdown-item" href="index.php?type=postself">Quản lý bài viết</a></li>
                ';
            }
            ?>
          
          </ul>
        </li>
            <li class="nav-item" >
            <a class="nav-link" href="" id=""><?php echo $_SESSION['user']['userName'];?></a>
          </li>
          <li class="nav-item" >
              <a class="nav-link" href="index.php?logout=1" id="">Đăng xuất</a>
            </li>
      </ul>
    </div>
  </div>
</nav>
</div>
