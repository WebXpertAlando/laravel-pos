<?php $__env->startSection("title", "Sales"); ?>
<?php $__env->startSection("contents"); ?>
    <div class="row">
        <div class="col-12">
		<br/>
		<br/>
		<br/>
		
		<div class="container">

		
		
		
            <h1>Sales <i class="fa fa-list"></i></h1>
            <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                    <tr>
                        <th>Date</th>
                       
                        <th>Total</th>
                        <th>Sales Receipt</th>
                        <th>Details</th>
                        <th>Delete</th>
                    </tr>
					<tr>

                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($sale->created_at); ?></td>
                          
                            <td>Ksh<?php echo e(number_format($sale->total, 2)); ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo e(route("Sales.ticket", ["id"=>$sale->id])); ?>">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="<?php echo e(route("sales.show", $sale)); ?>">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            <td>
                                <form action="<?php echo e(route("sales.destroy", [$sale])); ?>" method="POST">
                                    <?php echo method_field("delete"); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
						
						
						
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
				<br/>
				<br/>
				<br/>
				
				<?php echo e($sales->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\WEBXPERT\laravel-pos\resources\views/sales/sales_index.blade.php ENDPATH**/ ?>