<ul class="list-group list-group-flush">
    <li class="list-group-item active fw-bold">Comments</li>
    <?php foreach ($comments as $comment): ?>
        <li class="list-group-item">
            <?php echo $comment->content ?>
        </li>
    <?php endforeach; ?>
</ul>


