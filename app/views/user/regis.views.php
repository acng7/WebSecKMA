<link rel="stylesheet" href="public/css/login.css">
<div id="container4" style="margin-top:100px">
  <div id="title-container4">
    <h1>REGISTER</h1>
  </div>
<form action="" method="post">
  <div class="form-outline mb-4">
    <input type="text" id="" class="form-control" maxlength="255" required name="userName" />
    <label class="form-label" for="">Tên tài khoản</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="" class="form-control" maxlength="255" required name="password" />
    <label class="form-label" for="">Mật khẩu</label>
  </div>
  
  <div class="form-outline mb-4">
    <input type="text" id="" class="form-control" maxlength="255" required name="fullName" />
    <label class="form-label" for="">Họ và tên</label>
  </div>
  <div class="form-outline mb-4">
    <select name="role_id" class="form-control" id="" required>
      <?php
      foreach ($getAllRole as $key => $value) {
        echo'<option value="'.$value['id_role'].'">'.$value['nameRole'].'</option>';
      }
      ?>
    </select>
    <label class="form-label" for="">Vai trò bạn muốn đăng ký</label>
  </div>

  <!-- Submit button -->
  <button type="submit" name="btn-regis" class="btn btn-primary btn-block mb-4">Đăng ký</button>

  <!-- Register buttons -->
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
