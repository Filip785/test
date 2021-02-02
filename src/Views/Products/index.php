<h1><?= $title ?></h1>

<div class="base-products">
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

<div class="comments">
    <?php foreach($allComments as $comment) { ?>
        <div class="comment">
            <h2>Comment From: <?= $comment['name'] ?></h2>
            <p>Email: <?= $comment['email'] ?></p>
            <p>Message: <?= $comment['message'] ?></p>
        </div>
    <?php } ?>
</div>

<div class="comments-form">
    <form method="POST" action="/comments/create">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
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
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
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
            <label for="message">Message:</label>
            <textarea name="message" id="message" cols="30" rows="10"></textarea>
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