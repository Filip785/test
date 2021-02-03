<?php $hasErrors = isset($loginErrors); ?>

<a href="/products">Products Page</a>
<h1>Enter your admin username and password</h1>

<form action="/dashboard/doLogin" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <?php if($hasErrors) { ?>
            <?php if(isset($loginErrors['username'])) { ?>
                <div class="error-container">
                    <span><?= $loginErrors['username'] ?></span>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="form-group">
        <label for="password">Password</label>  
        <input type="password" name="password" id="password">
        <?php if($hasErrors) { ?>
            <?php if(isset($loginErrors['password'])) { ?>
                <div class="error-container">
                    <span><?= $loginErrors['password'] ?></span>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="form-group">
        <?php if($hasErrors) { ?>
            <?php if(isset($loginErrors['bad_login'])) { ?>
                <div class="error-container">
                    <span><?= $loginErrors['bad_login'] ?></span>
                </div>
            <?php } ?>
        <?php } ?>
        <input type="submit" value="Login">
    </div>
</form>