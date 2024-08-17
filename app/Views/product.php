<?= $this->include('layouts/profile_header') ?>


<div class="container-fluid">
  <div class="col-lg-12">
    <div class="p-5">
        <div class="text-left">
            <h1 class="h4 text-gray-900 mb-4">Create New Product!</h1>
        </div>


        <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>
<form class="user" action="<?= base_url('/product/store')?>" method="post" enctype="multipart/form-data">

    <?= csrf_field() ?> <!-- Include CSRF token for security -->
    
<div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input  class="form-control form-control-user" type="text" name="productName" id="productName" required placeholder="Product Name">
        </div>

    </div>

    <div class="form-group row">
        <div class="col-sm-3 mb-3 mb-sm-0">

           <input  class="form-control form-control-user" type="text" name="productMRP" id="productMRP"
           placeholder="Product MRP">
       </div>
       <div class="col-sm-3 mb-3 mb-sm-0">

        <input  type="text" name="productPrice" id="productPrice" required class="form-control form-control-user" 
        placeholder="Product Price">
    </div>
</div>
<div class="form-group col-sm-2">

</div>


<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control form-control-user" type="text" name="productBrand" id="productBrand"  placeholder="Brand Name" required>
    </div>
    
</div>


<div class="form-group row">

    <div class="col-sm-6">
        <input  class="form-control form-control-user" type="text" name="productOS" id="productOS" placeholder="Product OS">
    </div>
</div>





<div class="form-group row">
    <div class="col-sm-3 mb-3 mb-sm-0">
        <input class="form-control form-control-user" type="text" name="productRAM" id="productRAM"  placeholder="RAM" required>
    </div>
    <div class="col-sm-3">
        <input  class="form-control form-control-user" type="text" name="productHPP" id="productHPP" placeholder="Hard Disk Size">
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control form-control-user"  type="file" name="productImage" id="productImage"  placeholder="Product Image" required>
    </div>

</div>
<button type="submit" class="btn btn-primary btn-user btn-block col-sm-3">
 Add Product
</button>
</form>
<hr>
</div>
</div>
</div>
<?= $this->include('layouts/profile_footer') ?>