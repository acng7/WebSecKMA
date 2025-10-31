<link rel="stylesheet" href="public/css/login.css">
<div id="container4" style="margin-top:100px">
  <div id="title-container4">
    <h1>LOGIN</h1>
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
    
    <!-- Username input -->
    <div class="form-outline mb-4">
      <input type="text" 
             id="userName" 
             name="userName" 
             maxlength="255" 
             class="form-control"
             autocomplete="username"
             required />
      <label class="form-label" for="userName">Username</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" 
             id="password" 
             name="password" 
             maxlength="255" 
             class="form-control"
             autocomplete="current-password"
             required />
      <label class="form-label" for="password">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="rememberMe" />
          <label class="form-check-label" for="rememberMe"> Remember me </label>
        </div>
      </div>

      <div class="col">
        <!-- Simple link -->
        <a href="#!">Forgot password?</a>
      </div>
    </div>

    <!-- Submit button -->
    <button type="submit" name="btn-login" class="btn btn-primary btn-block mb-4">Sign in</button>

    <!-- Register buttons -->
    <div class="text-center">
      <p>Not a member? <a href="index.php?type=regis">Register</a></p>
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
