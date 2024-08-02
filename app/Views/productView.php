<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>
    
    <div>
        <!-- Display the product image -->
        <img src="<?= base_url(esc($product['productImage'])) ?>" alt="<?= esc($product['productName']) ?>" style="max-width: 300px;">
    </div>
    
    <div>
        <!-- Display product details -->
        <p><strong>Name:</strong> <?= esc($product['productName']) ?></p>
        <p><strong>Price:</strong> ₹<?= esc($product['productPrice']) ?></p>
        <p><strong>MRP:</strong> ₹<?= esc($product['productMRP']) ?></p>
        <p><strong>Brand:</strong> <?= esc($product['productBrand']) ?></p>
        <p><strong>OS:</strong> <?= esc($product['productOS']) ?></p>
        <p><strong>RAM:</strong> <?= esc($product['productRAM']) ?></p>
        <p><strong>HDD:</strong> <?= esc($product['productHDD']) ?></p>
    </div>

    <a href="/productDetails">Back to Products</a>
</body>
</html>
