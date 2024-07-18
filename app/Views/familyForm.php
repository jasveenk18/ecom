<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Family Member Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1, h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Family Member Details</h1>

    <form action="<?= base_url('/family/save') ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="relationship">Relationship:</label>
        <input type="text" id="relationship" name="relationship" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="occupation">Occupation:</label>
        <input type="text" id="occupation" name="occupation" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <h2>Family Members List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Relationship</th>
                <th>Age</th>
                <th>Occupation</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($family_members) && is_array($family_members)): ?>
                <?php foreach ($family_members as $member): ?>
                    <tr>
                        <td><?= esc($member['id']) ?></td>
                        <td><?= esc($member['name']) ?></td>
                        <td><?= esc($member['relationship']) ?></td>
                        <td><?= esc($member['age']) ?></td>
                        <td><?= esc($member['occupation']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No family members found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

