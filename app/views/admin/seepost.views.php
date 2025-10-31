<link rel="stylesheet" href="public/css/login.css">
<div id="container4">
  <div id="title-container4">
    <h1>XEM BÀI VIẾT</h1>
  </div>
  
  <?php if($error = getFlashMessage('error')): ?>
    <div class="alert alert-danger"><?= e($error) ?></div>
  <?php endif; ?>
  
  <?php if($success = getFlashMessage('success')): ?>
    <div class="alert alert-success"><?= e($success) ?></div>
  <?php endif; ?>
  
<form action="" method="post">
  <div class="form-outline mb-4">
    <img width="20%" src="<?= e($getPostById['postImage']) ?>" alt="Post Image" />
    <input type="text" id="postImage" name="postImage" value="<?= e($getPostById['postImage']) ?>" class="form-control" readonly />
    <label for="postImage">Link Ảnh</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="postName" name="postName" value="<?= e($getPostById['postName']) ?>" class="form-control" readonly />
    <label for="postName">Tên bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="postDescription" name="postDescription" value="<?= e($getPostById['postDescription']) ?>" class="form-control" readonly />
    <label for="postDescription">Mô tả bài viết</label>
  </div>
  <div class="form-outline mb-4">
    <textarea name="postContent" class="form-control" id="postContent" rows="10" readonly><?= e($getPostById['postContent']) ?></textarea>
    <label for="postContent">Nội dung bài viết</label>
  </div>
</form>

<form action="" method="post">
  <input type="hidden" name="csrf_token" value="<?= e(generateCsrfToken()) ?>">
  
  <h3>Bạn chỉ có thể cập nhật ghi chú và thể loại!</h3>
  <div class="form-outline mb-4">
    <input type="text" id="note" name="note" value="<?= e($getPostById['note']) ?>" class="form-control" maxlength="255" />
    <label for="note">Ghi chú</label>
  </div>
  <div class="form-outline mb-4">
    <select name="category_id" class="form-control" id="category_id" required>
      <?php foreach ($getAllCategory as $cate): ?>
        <option value="<?= e($cate['id_post_category']) ?>" 
                <?= $cate['id_post_category']==$getPostById['category_id'] ? 'selected' : '' ?>>
          <?= e($cate['nameCategory']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <label for="category_id">Thể loại</label>
  </div>
  <button type="submit" name="btn-save-post" class="btn btn-primary btn-block mb-4">LƯU</button>
  <a href="index.php?type=post" class="btn btn-secondary btn-block mb-4">Quay lại</a>
</form>
</div>
