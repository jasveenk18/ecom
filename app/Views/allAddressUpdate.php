<!-- view: edit_address.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Address</title>
</head>
<body>
    <h1>Edit Address</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <form action="<?= site_url('home/update/'.$address['id']) ?>" method="post">
        <?= csrf_field() ?>
        <label for="house_no">House No:</label>
        <input type="text" name="house_no" id="house_no" value="<?= esc($address['house_no']) ?>" required><br>

        <label for="address_line1">Address Line 1:</label>
        <input type="text" name="address_line1" id="address_line1" value="<?= esc($address['address_line1']) ?>" required><br>

        <label for="address_line2">Address Line 2:</label>
        <input type="text" name="address_line2" id="address_line2" value="<?= esc($address['address_line2']) ?>"><br>

        <label for="locality">Locality:</label>
        <input type="text" name="locality" id="locality" value="<?= esc($address['locality']) ?>" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" id="city" value="<?= esc($address['city']) ?>" required><br>

        <label for="zipcode">Zip Code:</label>
        <input type="text" name="zipcode" id="zipcode" value="<?= esc($address['zipcode']) ?>" required><br>

        <button type="submit">Update Address</button>
    </form>
    <form action="/home/update/<?= $address['id'] ?>" method="post">
    <?= csrf_field() ?> <!-- Include CSRF token for security -->
    <!-- Form fields -->
</form>
</body>
</html>
