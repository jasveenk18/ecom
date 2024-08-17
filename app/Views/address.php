<?= $this->include('layouts/profile_header') ?>
<div class="container-fluid">
  <div class="col-lg-9">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create New Address!</h1>
        </div>
        <form class="user" action="<?= base_url('/address/submit]')?>" method="post">

            <?= csrf_field() ?>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input  class="form-control form-control-user" type="text" id="house_no" name="house_no" placeholder="House Number">
                </div>
            </div>
            <div class="form-group">
                <input  type="text" id="address_line1" name="address_line1" class="form-control form-control-user" 
                placeholder="Address Line 1">
            </div>
            <div class="form-group">
                <input  class="form-control form-control-user" type="text" id="address_line2" name="address_line2"
                placeholder="Address Line 2">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user" type="text" id="locality" name="locality" placeholder="Locality" required>
                </div>
                <div class="col-sm-6">
                    <input  class="form-control form-control-user" type="text" id="city" name="city" placeholder="City">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user"type="text" id="zipcode" name="zipcode" placeholder="Zipcode" required>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
             Save
         </button>

     </form>
     <hr>
 </div>
</div>
</div>
<?= $this->include('layouts/profile_footer') ?>