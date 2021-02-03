<?php $hasValues = isset($commentValues); $hasFlash = isset($successFlash);?>

<?php if($hasFlash) { ?>
    <div id="flash" class="flash success">
        <p><?= $successFlash ?></p>
    </div>
<?php } ?>

<a href="/dashboard/login" class="<?= $hasFlash ? 'has-flash' : '' ?>">Dashboard</a>
<h1 class="main-title"><?= $title ?></h1>

<div class="base-products">
    <div class="bp-wrapper">
        <?php foreach ($allProducts as $productGroup) { ?>
            <div class="row">
                <?php foreach ($productGroup as $product) { ?>
                    <div class="product">
                        <img src="<?= $product['image'] ?>" alt="Juice Image">
                        <a href="/products/<?= $product['id'] ?>"><h2><?= $product['title'] ?></h2></a>
                        <p><?= $product['description'] ?></p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="comments">
    <div class="comments-wrapper">
        <?php foreach ($allComments as $comment) { ?>
            <div class="comment">
                <h2>Comment From: <?= $comment['name'] ?></h2>
                <p>Email: <?= $comment['email'] ?></p>
                <p>Message: <?= $comment['message'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<div class="comments-form">
    <form method="POST" action="/comments/create">
        <h1>Write your comment below</h1>
        <div class="form-group">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= $hasValues ? $commentValues['name'] : '' ?>">
            </div>
            <?php
                if(isset($commentErrors) && isset($commentErrors['name'])) {
            ?>
                <div class="error-container">
                    <span><?= $commentErrors['name'] ?></span>
                </div>
            <?php 
                }
            ?>
        </div>
        <div class="form-group">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= $hasValues ? $commentValues['email'] : '' ?>">
            </div>
            <?php 
                if(isset($commentErrors) && isset($commentErrors['email'])) {
            ?>
                <div class="error-container">
                    <span><?= $commentErrors['email'] ?></span>
                </div>
            <?php 
                }
            ?>
        </div>
        <div class="form-group">
            <div class="input-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" cols="25" rows="10"><?= $hasValues ? $commentValues['message'] : '' ?></textarea>
            </div>
            <?php 
                if(isset($commentErrors) && isset($commentErrors['message'])) {
            ?>
                <div class="error-container">
                    <span><?= $commentErrors['message'] ?></span>
                </div>
            <?php 
                }
            ?>
        </div>
        <div class="form-group">
            <input type="submit" value="Send Comment">
        </div>
    </form>
</div>