<?php
include 'includes/login_header.php';
?>
<div class="container py-5">
  <div class="row">
   <div class="col-md-12">
   <div class="error"><?php echo $errors['emptyboxes'] ?></div>
  <form action="" method="POST">
      <div class="form-group">
        <label for="first-name">Username:</label>
        <input type="text" class="form-control" placeholder="Username" value="<?php echo $username; ?>" id="Username" name="username">
        <div class="error"><?php echo $errors['invalid_username'] ?></div>
        <div class="error"><?php echo $errors['check_username'] ?></div>
      </div>
      <div class="form-group">
        <label for="first-name">First Name:</label>
        <input type="text" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>" id="first-name" name="fname">
        <div class="error"><?php echo $errors['invalid_firstname'] ?></div>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name:</label>
        <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>" id="last-name" name="lname">
        <div class="error"><?php echo $errors['invalid_lastname'] ?></div>
      </div>
      <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" placeholder="Enter email" value="<?php echo $email; ?>" id="email" name="email">
      <div class="error"><?php echo $errors['invalid_email'] ?></div>
      </div>
      <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" placeholder="Password" value="<?php echo $password; ?>" id="password" name="password">
          <div class="error"><?php echo $errors['invalid_password'] ?></div>
       </div>
      <input type="submit" value="Submit" class="btn btn-primary">
  </form>
   </div>
  </div>
 </div> 
<?php
include 'includes/footer.php';
?>