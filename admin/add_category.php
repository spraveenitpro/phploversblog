<?php include 'includes/header.php'; ?>

<?php
//Create DB object
$db = new Database();

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($db->link,$_POST['name']);


    //Validation

    if ($name == ''){
        //Set Error
        $error = 'Please fill out all required fields';
    } else {
        $query = "insert into categories (name)
                      values('$name')";

        $update_row = $db->update($query);
    }

}


?>



<form role="form" method="post" action="add_category.php">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="name"  placeholder="Enter Category">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit">
        <a href="index.php" class="btn btn-default">Cancel</a>

    </div>
</form>


<?php include 'includes/footer.php'; ?>
