<link rel="stylesheet" href="public/css/login.css">
<div id="container4" style="margin-top:100px">
  <div id="title-container4">
    <h1>REGISTER</h1>
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
    <input type="text" id="userName" class="form-control" maxlength="255" required name="userName" autocomplete="username" />
    <label class="form-label" for="userName">Tên tài khoản</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="password" class="form-control" maxlength="255" required name="password" autocomplete="new-password" />
    <label class="form-label" for="password">Mật khẩu</label>
  </div>
  
  <div class="form-outline mb-4">
    <input type="text" id="fullName" class="form-control" maxlength="255" required name="fullName" autocomplete="name" />
    <label class="form-label" for="fullName">Họ và tên</label>
  </div>
  
  <div class="form-outline mb-4">
    <select name="role_id" class="form-control" id="role_id" required>
      <option value="">-- Chọn vai trò --</option>
      <?php foreach ($getAllRole as $role): ?>
        <option value="<?= e($role['id_role']) ?>"><?= e($role['nameRole']) ?></option>
      <?php endforeach; ?>
    </select>
    <label class="form-label" for="role_id">Vai trò bạn muốn đăng ký</label>
  </div>

  <button type="submit" name="btn-regis" class="btn btn-primary btn-block mb-4">Đăng ký</button>

  <div class="text-center">
    <p>Already have an account? <a href="index.php?type=login">Sign in</a></p>
    <p>or sign up with:</p>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>
    <button type="button" class="btn btn-link btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
</div>
