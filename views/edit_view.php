<?php
include 'includes/header.php';
?>
<div class="container py-5">
  <div class="row">
   <div class="col-md-12">
  <form action="update.php" method="post">
  <input type="hidden" name="id" value="<?php echo $client["id"]; ?>">
      <div class="form-group">
        <label for="fname">First name:</label>
        <input type="text" class="form-control" id="fname"  name="fname" value="<?php echo $client["fname"]; ?>">
        <div class="error"><?php echo $errors['invalid_firstname'] ?></div>
      </div>
      <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" class="form-control" id="lname"  name="lname" value="<?php echo $client["lname"]; ?>">
        <div class="error"><?php echo $errors['invalid_lastname'] ?></div>
      </div>
      <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $client["email"]; ?>">
      <div class="error"><?php echo $errors['invalid_email'] ?></div>
      </div>
      <div class="form-group">
      <label for="email">Message:</label>
      <textarea class="form-control" id="message" name="message"><?php echo $client["message"]; ?></textarea>
      </div>
      <input type="submit" name="insert" value="Edit Details" class="btn btn-primary">
  </form>
   </div>
  </div>
 </div> 
<?php
include 'includes/footer.php';
?>