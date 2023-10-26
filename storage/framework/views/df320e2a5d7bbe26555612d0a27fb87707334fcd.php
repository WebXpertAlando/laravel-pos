
<?php $__env->startSection("title", "start"); ?>
<?php $__env->startSection('contents'); ?>

<br/>
<br/>

    <div class="col-12 text-center">
        <h1>Welcome, <?php echo e(Auth::user()->name); ?></h1>
    </div>
    <div class="card-columns">
        <a href="<?php echo e(route("products.index")); ?>" style="color: black;">
            <div class="card text-center">
                <img src="<?php echo e(url("/img/products.jpg")); ?>" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">Products</h1>
                </div>
            </div>
        </a>


        <a style="color: black;" href="<?php echo e(route("reports")); ?>">
            <div class="card text-center">
                <img src="<?php echo e(url("/img/reports.jpg")); ?>" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">Reports</h1>
                </div>
            </div>
        </a>
		
		

        <a style="color: black;" target="_blank" href="https://parzibyte.me/blog/contrataciones-ayuda/">
            <div class="card text-center">
                <img src="/img/support.jpg")}}" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">Support</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="<?php echo e(route("vendor.index")); ?>">
            <div class="card text-center">
                <img src="<?php echo e(url("/img/vendor.png")); ?>" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">Vendor</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="<?php echo e(route("about")); ?>">
            <div class="card text-center">
                <img src="<?php echo e(url("/img/about.jpg")); ?>" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">About</h1>
                </div>
            </div>
        </a>
		
		
		 <a style="color: black;" href="<?php echo e(route("users.index")); ?>">
            <div class="card text-center">
                <img src="<?php echo e(url("/img/users.jpg")); ?>" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">Users</h1>
                </div>
            </div>
        </a>
		
		
		
        <a style="color: black;" href="<?php echo e(route("sales.index")); ?>">
            <div class="card text-center">
                <img src="<?php echo e(url("/img/sales.jpg")); ?>" width="80" height="80">
                <div class="card-body">
                    <h1 class="card-title">Sales</h1>
                </div>
            </div>
        </a>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\WEBXPERT\laravel-pos\resources\views/home.blade.php ENDPATH**/ ?>