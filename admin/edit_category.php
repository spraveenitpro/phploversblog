<?php include 'includes/header.php'; ?>

<?php

$id = $_GET['id'];
//Create DB object
$db = new Database();



//Create Query
$query = "SELECT * from categories where id =".$id;
//Run the Query
$categories = $db->select($query)->fetch_assoc();
?>

    <form role="form" method="post" action="edit_category.php">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="name"  placeholder="Enter Category" value="<?php echo $categories['name']; ?>">
        </div>
        <div>
            <input name="submit" type="submit" class="btn btn-default" value="Submit" />
            <a href="index.php" class="btn btn-default">Cancel</a>
            <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
        </div>
    </form>


<?php include 'includes/footer.php'; ?>