<?php require __DIR__ . "/../../shared/layout/header.php"; ?>


<form method="POST" action="register">
    <div class="form-outline mb-4">
        <input type="text" name="username" class="form-control"/>
        <label class="form-label" for="username">Username</label>
    </div>

    <div class="form-outline mb-4">
        <input type="password" name="password" class="form-control"/>
        <label class="form-label" for="password">Password</label>
    </div>

    <button type="submit" class="btn btn-primary btn-block mb-4" value="Register"> Register</button>

</form>


<?php require __DIR__ . "/../../shared/layout/footer.php"; ?>
