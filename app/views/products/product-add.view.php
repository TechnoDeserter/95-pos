<?php require viewpath('partials/head');?>

    <div class="coantainer-fluid border rounded p-4 m-5 col-lg-4 mx-auto">
        <form method="post" enctype="multipart/form-data">

            
            <h5 class="text-dark"><i class="fa-solid fa-burger"></i> Add Product</h5>
            <div class="form-floating mt-4 mb-3">
                <input name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger':''?>" id="productfloatingInput" placeholder="Product Name">
                <label for="productfloatingInput" class="form-label">Product Name</label>
                <?php if(!empty($errors['description'])):?>
                    <small class="text-danger"><?=$errors['description']?></small>
                <?php endif;?>
            </div>
            <div class="form-floating mt-2 mb-3">
                <input name="barcode" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger':''?>" id="barcodefloatingInput" placeholder="Product Barcode">
                <label for="barcodedfloatingInput" class="form-label">Product Barcode<small class="text-muted"> (optional)</small></label>
                <?php if(!empty($errors['barcode'])):?>
                    <small class="text-danger"><?=$errors['barcode']?></small>
                <?php endif;?>
            </div>

            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                <input name="qty" type="number" class="form-control <?=!empty($errors['qty']) ? 'border-danger':''?>" id="floatingInputGrid" placeholder="Quantity" value="1" aria-label="Quantity">
                <label for="floatingInputGrid">Quantity</label>
                </div>
            </div>
            <div class="col-md">
            <div class="form-floating">
                <input name="amount" type="number" class="form-control <?=!empty($errors['amount']) ? 'border-danger':''?>" id="floatingInputGrid" placeholder="Price" step="0.50">
                <label for="floatingInputGrid">Price (₱)</label>
                <?php if(!empty($errors['amount'])):?>
                    <small class="text-danger"><?=$errors['amount']?></small>
                <?php endif;?>
            </div>
          </div>
        </div>
                <?php if(!empty($errors['qty'])):?>
                    <small class="text-danger"><?=$errors['qty']?></small>
                <?php endif;?>
                

                <br>
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger':''?>" type="file" id="formFile">
                <?php if(!empty($errors['image'])):?>
                    <small class="text-danger"><?=$errors['image']?></small>
                <?php endif;?>
            </div>

         <br>
            <button class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
            <a href="index.php?page=admin&tab=products">
            <button type="button"class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</button>
            </a>
        </form> 
</div>
    
<?php require viewpath('partials/foot');?>
