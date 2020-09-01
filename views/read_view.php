<?php 
include 'includes/header.php';
?>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Buttons</th>
                    </tr>
                        <?php if($readClient != null) { ?>
                        <?php foreach ($readClient as $readClients) { ?>
                        <tr>
                            <td>
                            <?php echo $readClients["fname"]; ?>
                            </td>
                            <td>
                            <?php echo $readClients["lname"]; ?>
                            </td>
                            <td>
                            <?php echo $readClients["email"]; ?>
                            </td>
                            <td>
                            <?php echo strlen($readClients["message"]) > 15 ? substr($readClients["message"], 0, 15)."..." : $readClients["message"]; ?>
                            </td>
                            <td>
                                <a href="single.php?id=<?php echo $readClients["id"]; ?>" class="btn btn-sm btn-primary">Read</a>
                                <a href="update.php?id=<?php echo $readClients["id"]; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $readClients["id"]; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>    
                         <?php } ?>
                        <?php } ?>
                    </table>
                </div>  
            </div>
        </div>    
    </div>
    <div class="row pt-3 mb-3">
        <div class="col">
            <div class="d-flex justify-content-center">
                <div class="pagination">
                <?php for($x = 1; $x <= $pages; $x++) { ?>
                        <a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage?>"<?php if($page == $x) {} ?>><?php echo $x; ?></a>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>    
</div>
<?php 
include 'includes/footer.php';
?>