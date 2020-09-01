<?php 
include 'includes/header.php';
?>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    User details
                </div>
                <div class="card-body">
                  <?php echo $client["fname"]; ?><br>
                  <?php echo $client["lname"]; ?><br>
                  <?php echo $client["email"]; ?><br>
                  <?php echo $client["message"]; ?><br>
              </div>
        </div>
      </div>
    </div>
</div>
<?php 
include 'includes/footer.php';
?>