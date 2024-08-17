<?= $this->include('layouts/profile_header') ?>
    <link href="<?= base_url('vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">

<?php


$loginStatus = session()->getFlashdata('CartStatus');
// print_r($loginStatus);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Available Products </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">    <?php if (!empty($products) && is_array($products)): ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <a href="<?= base_url('/product/details/'. $product['productID']) ?>">View Details</a> <!-- Added View Details link -->
                        </td>

                        <td>
                            <a href="<?= base_url('cart/add/'. $product['productID']) ?>">Add to cart</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>
</div>
</div>
<?= $this->include('layouts/profile_footer') ?>



    <!-- Page level plugins -->
    <script src="<?= base_url('vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('js/demo/datatables-demo.js')?>"></script>