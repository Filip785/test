<?php $hasSuccessFlash = isset($success_msg); $hasErrorFlash = isset($error_msg); ?>

<?php if($hasSuccessFlash) { ?>
    <div id="flash" class="flash success">
        <p><?= $success_msg ?></p>
    </div>
<?php } ?>

<?php if($hasErrorFlash) { ?>
    <div id="flash" class="flash error">
        <p><?= $error_msg ?></p>
    </div>
<?php } ?>


<a href="/products" class="<?= ($hasSuccessFlash || $hasErrorFlash) ? 'has-flash' : '' ?>">Products page</a>
<h1>Welcome, <?= $user['username'] ?></h1>

<div class="comments">
    <?php foreach($comments as $comment) { ?>
        <div class="comment">
            <h1><?= $comment['name'] ?> wrote:</h1>
            <p><?= $comment['message'] ?></p>
            <form action="/comments/allow/<?= $comment['id'] ?>" method="POST">
                <input type="submit" value="Allow">
            </form>
            <form action="/comments/disallow/<?= $comment['id'] ?>" method="POST">
                <input type="submit" value="Disallow">
            </form>
        </div>
    <?php } ?>
</div>


<a href="/dashboard/logout">Logout</a>