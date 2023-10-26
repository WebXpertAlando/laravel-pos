
<?php $__env->startSection("title", "Sales Details "); ?>
<?php $__env->startSection("contents"); ?>

  <div class="container">
  
    <div class="row">
        <div class="col-12">
		
		<br/>
		<br/>
		<br/>
            <h1>Sales Details #<?php echo e($sale->id); ?></h1>
            
			
            <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a class="btn btn-info" href="<?php echo e(route("sales.index")); ?>">
                <i class="fa fa-arrow-left"></i>&nbsp;Return
            </a>
            <a class="btn btn-success" href="<?php echo e(route("Sales.ticket", ["id" => $sale->id])); ?>">
                <i class="fa fa-print"></i>&nbsp;Receipt
            </a>
            <h2>Products</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
					<th>Date</th>
                    <th>Description</th>
                    <th>Barcode</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $sale->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
						<td><?php echo e($product->created_at); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td><?php echo e($product->barcode); ?></td>
                        <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                        <td><?php echo e($product->amount); ?></td>
                        <td>$<?php echo e(number_format($product->amount * $product->price, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                   
					<td colspan="4"></td>
                    <td><strong>Total</strong></td>
                    <td><strong>Ksh<?php echo e(number_format($total, 2)); ?></strong></td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
	
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/sales/sales_show.blade.php ENDPATH**/ ?>