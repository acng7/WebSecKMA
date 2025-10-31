<link rel="stylesheet" href="public/css/login.css">
<div id="container4">
  <div id="title-container4">
    <h1>THÊM DANH MỤC</h1>
  </div>
  
  <?php
  // Display flash messages
  if($error = getFlashMessage('error')): ?>
    <div class="alert alert-danger"><?= e($error) ?></div>
  <?php endif; ?>
  
  <?php if($success = getFlashMessage('success')): ?>
    <div class="alert alert-success"><?= e($success) ?></div>
  <?php endif; ?>
  
  <form action="" method="post">
    <!-- CSRF Token -->
    <input type="hidden" name="csrf_token" value="<?= e(generateCsrfToken()) ?>">
    
    <div class="form-outline mb-4">
      <input type="text" 
             id="nameCategory" 
             name="nameCategory" 
             value="<?= isset($_POST['nameCategory']) ? e($_POST['nameCategory']) : '' ?>" 
             class="form-control" 
             maxlength="255"
             required />
      <label for="nameCategory">Tên danh mục</label>
    </div>
    
    <button type="submit" name="btn-add-cate" class="btn btn-primary btn-block mb-4">Thêm</button>
    <a href="index.php?type=cate" class="btn btn-secondary btn-block mb-4">Quay lại</a>
  </form>
</div>
