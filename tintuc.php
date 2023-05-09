<?php include("view/top.php"); ?>

<style>
    .card-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="container">
    <div class="row">
        <?php foreach ($post_list as $post) : ?>
            <div class="col-md-4">
                <div class="card mb-4" onclick="window.location.href='index.php?action=post_detail&ID=<?php echo $post['id']; ?>'" style="cursor: pointer;">
                    <img class="card-img-top" src="<?php echo $post['AbsolutePath']; ?>" alt="<?php echo $post['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post['title']; ?></h5>
                        <p class="card-text"><?php echo $post['content']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include("view/bottom.php"); ?>