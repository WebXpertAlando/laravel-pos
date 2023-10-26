
<?php $__env->startSection("title", "Add Product"); ?>
<?php $__env->startSection("contents"); ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="<?php echo e(route("products.store")); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="label">Barcode</label>
                    <input required autocomplete="off" name="barcode" class="form-control"
                           type="text" placeholder="Barcode">
                </div>
                <div class="form-group">
                    <label class="label">Description</label>
                    <input required autocomplete="off" name="description" class="form-control"
                           type="text" placeholder="Description">
                </div>
                <div class="form-group">
                    <label class="label">Purchase Price</label>
                    <input required autocomplete="off" name="purchase_price" class="form-control"
                           type="decimal(9,2)" placeholder="Purchase Price">
                </div>
                <div class="form-group">
                    <label class="label">Sales Price</label>
                    <input required autocomplete="off" name="sales_price" class="form-control"
                           type="decimal(9,2)" placeholder="Sales Price">
                </div>
                <div class="form-group">
                    <label class="label">Existence</label>
                    <input required autocomplete="off" name="existence" class="form-control"
                           type="decimal(9,2)" placeholder="Existence">
                </div>

                <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-warning">Save Items</button>
                <a class="btn btn-primary" href="<?php echo e(route("products.index")); ?>">Back to List</a>
            </form>
        </div>
    </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\WEBXPERT\laravel-pos\resources\views/products/products_create.blade.php ENDPATH**/ ?>