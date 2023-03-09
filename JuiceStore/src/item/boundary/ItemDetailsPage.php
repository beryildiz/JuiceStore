<?php include __DIR__ . "/../../shared/layout/header.php"; ?>


<div class="container">
    <div class="grid">
        <div class="row">
            <ul class="list-group list-group-flush">
                <li class="list-group-item active fw-bold"><?php echo $item->name ?></li>
                <li class="list-group-item">ID: <?php echo $item->id ?></li>
                <li class="list-group-item">Price: <?php echo $item->price ?></li>
                <li class="list-group-item">Description: <?php echo $item->description ?></li>
            </ul>
        </div>

        <br>

        <div class="row">
            <?php include_once __DIR__ . "/../../comment/boundary/CommentPage.php" ?>
        </div>

        <br>

        <div class="row">
            <?php include_once __DIR__ . "/../../comment/boundary/WriteCommentPage.php" ?>
        </div>
    </div>
</div>

<?php include __DIR__ . "/../../shared/layout/footer.php"; ?>


