<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Form</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 10px 20px;
            font-size: 16px;
            line-height: 1.5;
            border-radius: 4px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Address Form</h2>
        <form action="/address/submit" method="post">
            <?= csrf_field() ?>
      
            <div class="form-group">
                <label for="house_no">House No:</label>
                <input type="text" id="house_no" name="house_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address_line1">Address Line 1:</label>
                <input type="text" id="address_line1" name="address_line1" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address_line2">Address Line 2:</label>
                <input type="text" id="address_line2" name="address_line2" class="form-control">
            </div>
            <div class="form-group">
                <label for="locality">Locality:</label>
                <input type="text" id="locality" name="locality" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Zip Code:</label>
                <input type="text" id="zipcode" name="zipcode" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <ul>
        <?php if (session()->get('logged_in_status') == true): ?>
            <li class="menu-item"><a href="http://localhost:8080/logout" target="">LogOut</a></li>
            <li class="menu-item"><a href="http://localhost:8080/address" target="">Address</a></li>
        <?php else: ?>
            <li class="menu-item"><a href="http://localhost:8080/login" target="">Login</a></li>
        <?php endif; ?>
    </ul>
</body>
</html>
<!DOCTYPE html>
