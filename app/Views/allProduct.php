<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
    <style>
        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<?php


$loginStatus = session()->getFlashdata('CartStatus');
print_r($loginStatus);
?>
    <h1>All Products</h1>
    <?php if (!empty($products) && is_array($products)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>MRP</th>
                    <th>Brand</th>
                    <th>OS</th>
                    <th>RAM</th>
                    <th>HDD</th>
                    <th>Image</th>
                    <th>Actions</th>
                    <th>Add to cart</th>  <!-- Added new column for Actions -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= esc($product['productID']) ?></td>
                        <td><?= esc($product['productName']) ?></td>
                        <td>₹<?= esc($product['productPrice']) ?></td>
                        <td>₹<?= esc($product['productMRP']) ?></td>
                        <td><?= esc($product['productBrand']) ?></td>
                        <td><?= esc($product['productOS']) ?></td>
                        <td><?= esc($product['productRAM']) ?></td>
                        <td><?= esc($product['productHDD']) ?></td>
                        <td>
                            <a href="#" class="image-link" data-image="<?= base_url(esc($product['productImage'])) ?>">View Image</a>
                        </td>
                        <td>
                            <a href="/product/details/<?= $product['productID'] ?>">View Details</a> <!-- Added View Details link -->
                        </td>

                        <td>
                            <a href="/cart/add/<?= $product['productID'] ?>">Add to cart</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</body>
</html>