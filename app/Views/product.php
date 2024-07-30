<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
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

        <label for="productHPP">Product HPP:</label>
        <input type="text" name="productHPP" id="productHPP" required><br>

        <label for="productImage">Product Image:</label>
        <input type="file" name="productImage" id="productImage" required><br>

        <button type="submit">Add Product</button>
    </form>
</html>

