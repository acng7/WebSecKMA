<link rel="stylesheet" href="public/css/login.css">
<div id="container4">
  <div id="title-container4">
    <h1>THÊM BÀI VIẾT</h1>
  </div>
  
  <?php if($error = getFlashMessage('error')): ?>
    <div class="alert alert-danger"><?= e($error) ?></div>
  <?php endif; ?>
  
  <?php if($success = getFlashMessage('success')): ?>
    <div class="alert alert-success"><?= e($success) ?></div>
  <?php endif; ?>
  
<form action="" method="post">
  <input type="hidden" name="csrf_token" value="<?= e(generateCsrfToken()) ?>">
  
  <div class="form-outline mb-4">
    <input type="url" id="postImage" name="postImage" value="" class="form-control" required />
    <label for="postImage">Link Ảnh</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="postName" name="postName" value="" class="form-control" maxlength="255" required />
    <label for="postName">Tên bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="postDescription" name="postDescription" value="" class="form-control" maxlength="255" required />
    <label for="postDescription">Mô tả bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <textarea name="postContent" class="form-control" id="postContent" rows="10" required></textarea>
    <label for="postContent">Nội dung bài viết</label>
  </div>
  <button type="submit" name="btn-add-post" class="btn btn-primary btn-block mb-4">Thêm</button>
  <a href="index.php?type=postself" class="btn btn-secondary btn-block mb-4">Quay lại</a>
</form>
</div>
