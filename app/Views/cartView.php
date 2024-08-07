<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>
    
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    
    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $item): ?>
            <tr>
                <td><?= $item['product']['name'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td><?= $item['product']['price'] ?></td>
                <td><?= $item['quantity'] * $item['product']['price'] ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Your cart is empty.</td>
            </tr>
        <?php endif; ?>
    </table>
    <form action="<?= site_url('cart/update') ?>" method="post">
    <!-- Include CSRF token for security -->
    <?= csrf_field() ?>
    
    <!-- Cart items form fields -->
    <input type="hidden" name="cart[item_id]" value="1"> <!-- Example hidden field -->
    <input type="number" name="cart[quantity]" value="1">

    <button type="submit">Update Cart</button>
</form><table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['product_name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td>
                    <a href="<?= site_url('cart/add/' . $product['id']) ?>" class="btn btn-primary">Add to Cart</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<form action="<?= site_url('cart/add') ?>" method="post">
    <?= csrf_field() ?> <!-- CSRF protection -->
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Add to Cart</button>
</form>
y>
    <h1>Product Successfully Added</h1>
    <p class="success-message">The product has been successfully added to your cart.</p>
    <p>Server Time: <?= date('Y-m-d H:i:s') ?></p>
    <a href="<?= site_url('products') ?>">Back to Products</a>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <h1>Your Cart</h1>
    <?php if (!empty($cartItems)): ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= esc($item['name']) ?></td>
                        <td><?= esc($item['quantity']) ?></td>
                        <td><?= esc($item['price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <a href="<?= site_url('') ?>">Continue Shopping</a>
    <h1>Your Cart</h1>
    <?php if (!empty($cartItems)): ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= esc($item['name']) ?></td>
                        <td><?= esc($item['quantity']) ?></td>
                        <td><?= esc($item['price']) ?></td>
                        <td><?= esc($item['quantity'] * $item['price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><strong>Total:</strong> <?= array_sum(array_map(fn($item) => $item['quantity'] * $item['price'], $cartItems)) ?></p>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <a href="<?= site_url('') ?>">Continue Shopping</a>
</body>
</html>

</body>
</html>
