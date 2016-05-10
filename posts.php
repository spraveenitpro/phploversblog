
<?php include 'includes/header.php'; ?>



<?php
//Create DB object
$db = new Database();

//Check URL for category

if(isset($_GET['category'])) {
    $category = $_GET['category'];
    //Create Query
    $query = "SELECT * from posts where category=".$category;
    //Run the Query
    $posts = $db->select($query);
} else {
    //Create Query
    $query = "SELECT * from posts";
    //Run the Query
    $posts = $db->select($query);
}





//Create Query
$query = "SELECT * from categories";
//Run the Query
$categories = $db->select($query);
?>
<?php  if($posts) : ?>
    <?php while($row = $posts->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];  ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#">Mark</a></p>
            <?php echo shortenText($row['body']); ?>
            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']);  ?>">Read More</a>

        </div><!-- /.blog-post -->
    <?php endwhile; ?>

<?php else : ?>
    <p>There are no Posts !!</p>
<?php endif; ?>


<?php include 'includes/footer.php'; ?>

