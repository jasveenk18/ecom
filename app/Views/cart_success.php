<!DOCTYPE html>
<html>
<head>
    <title>Product Added</title>
    <style>
        .success-message {
            color: green;
            font-size: 1.2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Product Successfully Added</h1>
    <p class="success-message">The product has been successfully added to your cart.</p>
    <a href="<?= site_url('products') ?>">Back to Products</a>
    <h1>Product Successfully Added</h1>
    <p class="success-message">The product has been successfully added to your cart.</p>
    <p>Server Time: <?= date('Y-m-d H:i:s') ?></p>
    <a href="<?= site_url('products') ?>">Back to Products</a>
</body>
</html>
