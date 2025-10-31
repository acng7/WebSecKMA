<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  fixed-top" style="background-color: black;">
    <div class="container-fluid">
      <button
        data-mdb-collapse-init
        class="navbar-toggler"
        type="button"
        data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white active" aria-current="page" href="index.php?type=home">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Danh mục
          </a>
          <ul class="dropdown-menu">
          <?php
          foreach ($getAllCategory as $key ) {
            echo'
            <li><a class="dropdown-item" href="index.php?type=cate&id='.$key['id_post_category'].'">'.$key['nameCategory'].'</a></li>
          ';
          }
        ?>
        </ul>
        </li>
        <?php
          if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
            echo'
            <li class="nav-item" >
            <a class="nav-link text-white" href="" id="">'.$_SESSION['user']['userName'].'</a>
          </li>
          <li class="nav-item" >
              <a class="nav-link text-white" href="index.php?logout=1" id="">Đăng xuất</a>
            </li>
            ';
          }else{
            echo'
            <li class="nav-item" >
            <a class="nav-link text-white" href="index.php?type=login" id="">Đăng nhập</a>
          </li>
          <li class="nav-item" >
              <a class="nav-link text-white" href="index.php?type=regis" id="">Đăng ký</a>
            </li>
            ';
          }
        ?>
          </ul>
        <form class="d-flex" action="index.php?type=search" method="post" role="search">
        <input class="form-control me-2"  type="text" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark"  type="submit" name="btn-search">Search</button>
      </form>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Background image -->
  <?php
  if(isset($_GET['type'])){
    if($_GET['type']!=='login' && $_GET['type']!=='regis' && $_GET['type']!=='detail'){
      echo'
      <div
    class="p-5 text-center bg-image"
    style="
      background-image: url(\'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLsxYQncjgVR6iwLSBeWxhGPVKsB_fCGQU0A&s\');
      height: 400px;
    "
  >
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">TRANG TIN TỨC</h1>
          <h4 class="mb-3">2024</h4>
        </div>
      </div>
    </div>
  </div>
      ';
    }
  }else{
    echo'
    <div
  class="p-5 text-center bg-image"
  style="
    background-image: url(\'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLsxYQncjgVR6iwLSBeWxhGPVKsB_fCGQU0A&s\');
    height: 400px;
    margin-top: 58px;
  "
>
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">TRANG TIN TỨC</h1>
        <h4 class="mb-3">2024</h4>
      </div>
    </div>
  </div>
</div>
    ';
  }
  ?>
</header>
