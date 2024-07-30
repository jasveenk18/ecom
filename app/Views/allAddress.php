<!DOCTYPE html>
<html>
<head>
    <title>My Addresses</title>
   
</head>
<body>
    <h1>My Addresses</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>House No</th>
            <th>Address Line 1</th>
            <th>Address Line 2</th>
            <th>Locality</th>
            <th>City</th>
            <th>Zip Code</th>
        </tr>
        <?php 
       
        
        if (!empty($addresses) && is_array($addresses)): ?>
            <?php foreach ($addresses as $address): 
               
                
                ?>
            <tr>
                <td><?= esc($address['id']) ?></td>
                <td><?= esc($address['house_no']) ?></td>
                <td><?= esc($address['address_line1']) ?></td>
                <td><?= esc($address['address_line2']) ?></td>
                <td><?= esc($address['locality']) ?></td>
                <td><?= esc($address['city']) ?></td>
                <td><?= esc($address['zipcode']) ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="no-address">No addresses found.</td>
            </tr>
        <?php endif; ?>
    </table>
    </form>
</body>
</html>

