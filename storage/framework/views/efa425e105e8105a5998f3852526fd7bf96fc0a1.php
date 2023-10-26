
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">


<?php $__env->startSection("title", "Items"); ?>
<?php $__env->startSection("contents"); ?>
<br/>
<br/>


<div class="container">

 
    <div class="row">
        <div class="col-12">
            <h1>Items <i class="fa fa-box"></i></h1>
            <a href="<?php echo e(route("products.create")); ?>" class="btn btn-success mb-2">Add Vendor  Items</a>
			
			&nbsp;
		 <a href="" class="btn btn-warning mb-2">Purchase Vendor  Items</a>
        
           <table class="table table-bordered table-condensed yajra-datatable" id="">
            <thead>
               <tr>
			      
                  <th>Barcode</th>
                  <th>Description</th>
				  <th>Purchase price</th>
				  <th>Sales Price</th>
                  <th>Stock</th>
				  <th>Action</th>
				  
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
                     
	
					 
 
						
                    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
         $(function () {
           var table = $('.yajra-datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('products.index')); ?>",
			   
               columns: [
			       
                   {data: 'barcode', name: 'barcode'},
                   {data: 'description', name: 'description'},
                   {data: 'purchase_price', name: 'purchase_price'},
				   {data: 'sales_price', name: 'sales_price'},
				   {data: 'existence', name: 'existence'},
				   {data: 'action', name: 'action',orderable: false,searchable: false},
				   
				   
	
				   
               ]
			  
           });
         });
          
      </script>
		

				
	  
	
</div>




            </div>
        </div>
    </div>

    <br/>
    <br/>


    </div>
</div>
<?php $__env->stopSection(); ?>









                          
<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/products/products_index.blade.php ENDPATH**/ ?>