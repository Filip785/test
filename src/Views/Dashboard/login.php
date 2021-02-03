<h1>Enter your admin username and password</h1>

<form action="/dashboard/doLogin" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>  
        <input type="password" name="password" id="password">
    </div>
    <div class="form-group">
        <?php if(isset($loginErrors)) { ?>
            <?php if(isset($loginErrors['bad_login'])) { ?>
                <div class="error-container">
                    <span><?= $loginErrors['bad_login'] ?></span>
                </div>
            <?php } ?>
        <?php } ?>
        <input type="submit" value="Login">
    </div>
</form>