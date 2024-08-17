<?= $this->include('layouts/profile_header') ?>


<?php if (session()->getFlashdata('success')): ?>
<p style="color:green;"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<p style="color:red;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>
<div class="container-fluid">
  <div class="col-lg-9">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit Address!</h1>
        </div>


        <form class="user" action="<?= base_url('/home/updateAddress')?>" method="post">
            <?= csrf_field() ?> <!-- Include CSRF token for security -->

      <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input  class="form-control form-control-user" type="text" id="house_no" name="house_no" placeholder="House Number" value="<?= $address['house_no'] ?>">
                </div>
            </div>
            <div class="form-group">
                <input  type="text" id="address_line1" name="address_line1" class="form-control form-control-user" value="<?=  $address['address_line1'] ?>" required                placeholder="Address Line 1">
            </div>
            <div class="form-group">
                <input  class="form-control form-control-user" type="text" id="address_line2" name="address_line2" value="<?= $address['address_line2']?>"
                placeholder="Address Line 2">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user" type="text" id="locality" name="locality" placeholder="Locality" value="<?=  $address['locality'] ?>" required>
                </div>
                <div class="col-sm-6">
                    <input  class="form-control form-control-user" type="text" id="city" value="<?=  $address['city'] ?>" name="city" placeholder="City">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user"type="text" id="zipcode" name="zipcode" placeholder="Zipcode" required value="<?=  $address['zipcode'] ?>">
                </div>
                
            </div>
                        <input type="hidden" name="tableId" id="id" value="<?=  $address['id'] ?>" required>

            <button type="submit" class="btn btn-primary btn-user btn-block">
             Update Address
         </button>
        </form>
             <hr>
 </div>
</div>
</div>
        <?= $this->include('layouts/profile_footer') ?>