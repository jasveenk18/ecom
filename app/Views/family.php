<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>"> <!-- Optional: Add your CSS file for styling -->
</head>
<body>
    <h1>User List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($users) && is_array($users)): ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['password']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No users found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
