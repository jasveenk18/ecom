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
</form>

</body>
</html>
