<?php
include 'includes/login_header.php';
?>
<div class="container py-5">
  <div class="row">
   <div class="col-md-12">
   <div class="error"><?php echo $errors['emptyboxes'] ?></div>
   <div class="error"><?php echo $errors['invalid_input'] ?></div>
  <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" placeholder="Username" value="<?php echo $username; ?>" id="email" name="username">
        <div class="error"><?php echo $errors['invalid_username'] ?></div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" value="<?php echo $password; ?>" placeholder="Password" name="password">
        <div class="error"><?php echo $errors['invalid_password'] ?></div>
        <div class="form-check pt-2">
        <label class="form-check-label">
        <input type="checkbox" class="form-check-input" id="showHide"><span>Show Password</span>
        </label>
      </div>
      </div>
      <input type="submit" value="Login" name="login_button" class="btn btn-primary">
  </form>
   </div>
  </div>
 </div> 
<?php
include 'includes/footer.php';
?>