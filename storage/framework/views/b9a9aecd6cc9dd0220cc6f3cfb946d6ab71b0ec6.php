
<?php $__env->startSection("title", "New Sale"); ?>
<?php $__env->startSection("contents"); ?>

<br/>
<br/>

<div class="container">


    <div class="row">
        <div class="col-12">
            <h1>New Sale <i class="fa fa-cart-plus"></i></h1>
            <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="<?php echo e(route("endOrCancelSale")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        
					
						
                        <?php if(session("products") !== null): ?>
                            <div class="form-group">
                                <button name="action" value="End Sale" type="submit" class="btn btn-success">Complete
                                    Sale
                                </button>
                                
                            </div>
                        <?php endif; ?>
                 </form>
                </div>
				
				 <div class="col-12 col-md-6">
                    <form action="<?php echo e(route("addProductSale")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                    <div align="left"><div class="form-group">
                            <label for="code">Barcode</label>
                            <input id="code" autocomplete="off" required autofocus name="code" type="text"
                                   class="form-control"
                                   placeholder="barcode"></div></div>
                 
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if(session("products") !== null): ?>
                <h2>Total: Ksh<?php echo e(number_format($total, 2)); ?></h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Bar Code</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                     
				  <?php $__currentLoopData = session("products"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->barcode); ?></td>
                                <td><?php echo e($product->description); ?></td>
                                <td>Ksh<?php echo e(number_format($product->sales_price, 2)); ?></td>
                                <td><?php echo e($product->amount); ?></td>
                                <td>
                                    <form action="<?php echo e(route("endOrCancelSale")); ?>" method="POST">
                                    <?php echo method_field("delete"); ?>
                                    <?php echo csrf_field(); ?>
                                        <input type="hidden" name="indice">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
		   
								   
			<img src="<?php echo e(url("/img/inventory.jpg")); ?>" width="900" height="400"> 
                   
            <?php endif; ?>
        </div>
    </div>
	
	</div>
<?php $__env->stopSection(); ?>

</div>
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/vendor/vendor.blade.php ENDPATH**/ ?>