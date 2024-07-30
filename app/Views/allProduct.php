<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
</head>
<body>
    <h1>All Products</h1>
    <?php if (!empty($products) && is_array($products)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>MRP</th>
                    <th>Brand</th>
                    <th>OS</th>
                    <th>RAM</th>
                    <th>HDD</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= esc($product['productID']) ?></td>
                        <td><?= esc($product['productName']) ?></td>
                        <td>₹<?= esc($product['productPrice']) ?></td>
                        <td>₹<?= esc($product['productMRP']) ?></td>
                        <td><?= esc($product['productBrand']) ?></td>
                        <td><?= esc($product['productOS']) ?></td>
                        <td><?= esc($product['productRAM']) ?></td>
                        <td><?= esc($product['productHDD']) ?></td>
                        <td>
                            <a href="<?= base_url('uploads/' . esc($product['productImage'])) ?>" target="_blank">
                                <img src="<?= base_url('uploads/' . esc($product['productImage'])) ?>" alt="Product Image" width="100">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
    <h1>Add Product</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <form action="/product/store" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- Include CSRF token for security -->
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" id="productName" required><br>

        <label for="productPrice">Product Price:</label>
        <input type="text" name="productPrice" id="productPrice" required><br>

        <label for="productMRP">Product MRP:</label>
        <input type="text" name="productMRP" id="productMRP" required><br>

        <label for="productBrand">Product Brand:</label>
        <input type="text" name="productBrand" id="productBrand" required><br>

        <label for="productOS">Product OS:</label>
        <input type="text" name="productOS" id="productOS" required><br>

        <label for="productRAM">Product RAM:</label>
        <input type="text" name="productRAM" id="productRAM" required><br>

        <label for="productHPP">Product HDD:</label>
        <input type="text" name="productHPP" id="productHPP" required><br>

        <label for="productImage">Product Image:</label>
        <input type="file" name="productImage" id="productImage" required><br>

        <button type="submit">Add Product</button>
</body>
</html>
