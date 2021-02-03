<?php $hasErrors = isset($loginErrors); $hasLoginValues = isset($loginValues); $hasFlash = isset($errorFlash); ?>

<?php if($hasFlash) { ?>
    <div id="flash" class="flash error">
        <p><?= $errorFlash ?></p>
    </div>
<?php } ?>

<form action="/dashboard/doLogin" method="POST" class="login-form">
    <a href="/products" class="<?= $hasFlash ? 'has-flash' : '' ?>">Products Page</a>
    <h1>Enter your admin username and password</h1>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= $hasLoginValues ? $loginValues['username'] : '' ?>">

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
        <input type="password" name="password" id="password" <?= $hasLoginValues ? $loginValues['password'] : '' ?>>

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
                <div class="error-container single">
                    <span><?= $loginErrors['bad_login'] ?></span>
                </div>
            <?php } ?>
        <?php } ?>
        <input type="submit" value="Login">
    </div>
</form>