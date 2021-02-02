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