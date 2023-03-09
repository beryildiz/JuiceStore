<?php include __DIR__ . "/../../shared/layout/header.php"; ?>

<br>
<br>

<!-- Invoked by ItemManager render() function -->
<ul class="list-group">
    <?php foreach ($items as $item): ?>
        <li class="list-group-item">
            <a href="item?id=<?php echo $item->id; ?>">
                <?php echo $item->name; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>


<?php include __DIR__ . "/../../shared/layout/footer.php"; ?>

