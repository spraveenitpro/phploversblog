<?php include 'config/config.php' ; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'helpers/format_helper.php'; ?>


<?php
    //Create DB object
    $db = new Database();

    //Create Query
    $query = "SELECT * from posts";

    //Run the Query
    $posts = $db->select($query);
?>
<?php  if($posts) : ?>
    <?php while($row = $posts->fetch_assoc()) : ?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $row['title'];  ?></h2>
                <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#">Mark</a></p>
                <?php echo shortenText($row['body']); ?>
                <a class="readmore" href="post.php?id=<?php echo $row['id'];  ?>">Read More</a>

            </div><!-- /.blog-post -->
    <?php endwhile; ?>

<?php else : ?>
    <p>There are no Posts !!</p>
<?php endif; ?>


<?php include 'includes/footer.php'; ?>

