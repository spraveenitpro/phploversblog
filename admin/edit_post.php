<?php include 'includes/header.php'; ?>

<?php

    $id = $_GET['id'];
    //Create DB object
    $db = new Database();

    //Create Query
    $query = "SELECT * from posts where id =".$id;
    //Run the Query
    $post = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * from categories";
    //Run the Query
    $categories = $db->select($query);
?>

<?php

if(isset($_POST['submit'])){
    //Assign Post variables
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    //echo $title;die();

    $body = mysqli_real_escape_string($db->link,$_POST['body']);
    $category = mysqli_real_escape_string($db->link,$_POST['category']);
    $author = mysqli_real_escape_string($db->link,$_POST['author']);
    $tags = mysqli_real_escape_string($db->link,$_POST['tags']);

    //Validation

    if ($title  == ''|| $body == ''|| $category == '' || $author == ''){
        //Set Error
        $error = 'Please fill out all required fields';
    } else {
        $query = "update posts
                 SET title = '$title',
                     body  = '$body',
                     category = '$category',
                     author = '$author',
                     tags = '$tags'
                     WHERE id =".$id;

        $update_row = $db->update($query);
    }

}




?>

<?php

if(isset($_POST['delete'])) {

    //Call Delete Method

    $query = "DELETE from posts where id =".$id;
    $delete_row = $db->delete($query);


}

?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $post['title']; ?>">
    </div>

    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Content"><?php echo $post['body']; ?></textarea>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name ="category" class="form-control">

            <?php while( $row = $categories->fetch_assoc()) : ?>
            <?php if( $row['id'] == $post['category']) {
                    $selected = 'selected';
                    } else {
                        $selected = '';
                    }

            ?>
            <option value="<?php echo $row['id']; ?>" <?php echo $selected;  ?>><?php echo $row['name']; ?></option>
            <?php endwhile; ?>

        </select>
    </div>

    <div class="form-group">
        <label>Author</label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author']; ?>">
    </div>


    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Enter tags" value="<?php echo $post['tags']; ?>">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete" />
    </div>
</form>



<?php include 'includes/footer.php'; ?>
