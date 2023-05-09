<?php include("view/top.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $post['title']; ?></h1>
            <img src="<?php echo $post['AbsolutePath']; ?>" alt="<?php echo $post['title']; ?>">
            <p></p>
            <p><?php echo $post['content']; ?></p>
        </div>
    </div>
</div>

<?php include("view/bottom.php"); ?>