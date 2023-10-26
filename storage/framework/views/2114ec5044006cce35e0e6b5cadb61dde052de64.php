

<?php $__env->startSection("title", "Items"); ?>
<?php $__env->startSection("contents"); ?>
<br/>
<br/>
<br/>

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Items <i class="fa fa-box"></i></h1>
            <a href="<?php echo e(route("products.create")); ?>" class="btn btn-success mb-2">Add Items</a>
            <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
            <div class="table-responsive">
 
                <table class="table table-striped yajra-datatable" id="products-table">
            
                  <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                  <input type="text" class="form-control" id="filter" name="filter" placeholder="Product name..." value="">
                    <thead>
                    <tr>
					    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('category.name', 'Category'));?></th>
                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('barcode', 'Barcode'));?></th>
                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('description', 'Description'));?></th>
                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('purchase_price', 'Purchase Price'));?></th>
                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('sales_price', 'Sales price'));?></th>
                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('existence' ,'Existence'));?></th>
                     

                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
        
                    <tbody>
                     <?php if($products->count() == 0): ?>
                     <tr>
                    <td colspan="15" style="color=red";>No Items to display.</td>
                    </tr>
                     <?php endif; ?>

                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->barcode); ?></td>
                            <td><?php echo e($product->description); ?></td>
                            <td><?php echo e($product->purchase_price); ?></td>
                            <td><?php echo e($product->sales_price); ?></td>
                            <td><?php echo e($product->sales_price - $product->purchase_price); ?></td>
                            <td><?php echo e($product->existence); ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?php echo e(route("products.edit",[$product])); ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            
                          
                            <td>
                                <form action="<?php echo e(route("products.destroy", [$product])); ?>" method="post">
                                    <?php echo method_field("delete"); ?>
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                               
                            </td>
                        </tr>
                     
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>				 
					 
 
						
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>



<?php echo e($products->links()); ?>


<?php echo $products->appends(Request::except('page'))->render(); ?>


<p>
    Displaying <?php echo e($products->count()); ?> of <?php echo e($products->total()); ?> product(s).
</p>

</div>




            </div>
        </div>
    </div>

    <br/>
    <br/>


    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/products/index-sorting.blade.php ENDPATH**/ ?>