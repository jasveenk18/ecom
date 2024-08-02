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
    
    <form action="/home/updateAddress" method="post">
        <?= csrf_field() ?> <!-- Include CSRF token for security -->
        
        <label for="house_no">House No:</label>
        <input type="text" name="house_no" id="house_no" value="<?= $address['house_no'] ?>" required><br>
        
        <label for="address_line_1">Address Line 1:</label>
        <input type="text" name="address_line1" id="address_line1" value="<?=  $address['address_line1'] ?>" required><br>

        <label for="address_line2">Address Line 2:</label>
        <input type="text" name="address_line2" id="address_line2" value="<?= $address['address_line2']?>"><br>
        
        <label for="locality">Locality:</label>
        <input type="text" name="locality" id="locality" value="<?=  $address['locality'] ?>" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" id="city" value="<?=  $address['city'] ?>" required><br>

        <label for="zipcode">Zip Code:</label>
        <input type="text" name="zipcode" id="zipcode" value="<?=  $address['zipcode'] ?>" required><br>




        <input type="hidden" name="tableId" id="id" value="<?=  $address['id'] ?>" required>
        <button type="submit">Update Address</button>
    </form>
</body>
</html>
