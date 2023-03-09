<?php include __DIR__ . "/../../shared/layout/header.php"; ?>

<br>
<br>

<div class="container w-25">
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item active fw-bold"><?php echo $item->name ?></li>
            <li class="list-group-item">ID: <?php echo $item->id ?></li>
            <li class="list-group-item">Price: <?php echo $item->price ?></li>
            <li class="list-group-item">Description: <?php echo $item->description ?></li>
        </ul>
    </div>
</div>

<?php include __DIR__ . "/../../shared/layout/footer.php"; ?>
