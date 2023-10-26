<?php $__env->startSection("title", "Edit product"); ?>
<?php $__env->startSection("contents"); ?>

<br/>
<br/>
<br/>
<br/>
<br/>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit product</h1>
            <form method="POST" action="<?php echo e(route("products.update", [$product])); ?>">
                <?php echo method_field("PUT"); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="label">Barcode</label>
                    <input required value="<?php echo e($product->barcode); ?>" autocomplete="off" name="barcode"
                           class="form-control"
                           type="text" placeholder="barcode">
                </div>
                <div class="form-group">
                    <label class="label">Description</label>
                    <input required value="<?php echo e($product->description); ?>" autocomplete="off" name="description"
                           class="form-control"
                           type="text" placeholder="Description">
                </div>
                <div class="form-group">
                    <label class="label">Purchase Price</label>
                    <input required value="<?php echo e($product->purchase_price); ?>" autocomplete="off" name="purchase Price"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de compra">
                </div>
                <div class="form-group">
                    <label class="label">Sales Price</label>
                    <input required value="<?php echo e($product->sales_price); ?>" autocomplete="off" name="sales_price"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Sales Price">
                </div>
                <div class="form-group">
                    <label class="label">Existence</label>
                    <input required value="<?php echo e($product->existence); ?>" autocomplete="off" name="existence"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Existence">
                </div>

                <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-success">Save Product</button>
                <a class="btn btn-primary" href="<?php echo e(route("products.index")); ?>">Return</a>
            </form>
        </div>
    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/products/products_edit.blade.php ENDPATH**/ ?>