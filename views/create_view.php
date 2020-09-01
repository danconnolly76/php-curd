<?php
include 'includes/header.php';
?>
<div class="container py-5">
  <div class="row">
   <div class="col-md-12">
    <form action="" method="POST">
        <div class="form-group">
          <label for="fname">First name:</label>
          <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
          <div class="error"><?php echo $errors['invalid_firstname'] ?></div>
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
          <div class="error"><?php echo $errors['invalid_lastname'] ?></div>
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
          <div class="error"><?php echo $errors['invalid_email'] ?></div>
        </div>
        <div class="form-group">
          <label for="email">Message:</label>
          <textarea class="form-control" placeholder="Enter Message" id="message" name="message"></textarea>
        </div>
      <input type="submit" value="Submit" class="btn btn-primary">
    </form>
   </div>
  </div>
 </div> 
<?php
include 'includes/footer.php';
?>