<!DOCTYPE html>
<html>
<head>
    <title>My Addresses</title>
   
</head>
<body>

    </form>

    <h1>My Addresses</h1>
    <?php if (!empty($addresses) && is_array($addresses)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>House No</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>Locality</th>
                    <th>City</th>
                    <th>Zip Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addresses as $address): ?>
                    <tr>
                        <td><?= esc($address['id']) ?></td>
                        <td><?= esc($address['house_no']) ?></td>
                        <td><?= esc($address['address_line1']) ?></td>
                        <td><?= esc($address['address_line2']) ?></td>
                        <td><?= esc($address['locality']) ?></td>
                        <td><?= esc($address['city']) ?></td>
                        <td><?= esc($address['zipcode']) ?></td>
                        <td><a href="<?= site_url('home/editAddress/'.$address['id']) ?>">Update</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No addresses found.</p>
    <?php endif; ?>
</body>
</html>

