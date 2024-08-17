<?= $this->include('layouts/profile_header') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">My Address</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <?php if (!empty($addresses) && is_array($addresses)): ?>
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                <thead>
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
                            <td><a href="<?= base_url('home/editAddress/'.$address['id']) ?>">Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No addresses found.</p>
        <?php endif; ?>


    </div>
</div>
</div>
<?= $this->include('layouts/profile_footer') ?>