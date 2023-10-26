<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e(env("APP_NAME")); ?>">
    <meta name="author" content="Parzibyte">
    <title><?php echo $__env->yieldContent("title"); ?> - <?php echo e(env("APP_NAME")); ?></title>
    <link href="<?php echo e(url("/css/bootstrap.min.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(url("/css/all.min.css")); ?>" rel="stylesheet">
	
	<!-- Data Tables Library Files -->
	
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> 
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />		 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	
    <style>
        body {
            padding-top: 70px;
            /*Para la barra inferior fija*/
            padding-bottom: 70px;
        }
    </style>




</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" target="_blank" href="//parzibyte.me/blog"><?php echo e(env("APP_NAME")); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            id="botonMenu" aria-label="Mostrar u ocultar menú">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>">
                        Register
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("home")); ?>">Home&nbsp;<i class="fa fa-home fa-3x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("products.index")); ?>">Items&nbsp;<i class="fa fa-box fa-3x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("vendor.index")); ?>">Vendor&nbsp;<i class="fa fa-cart-plus fa-3x"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("sales.index")); ?>">Sales&nbsp;<i class="fa fa-list fa-3x"></i></a>
                </li>
				
				<li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route("reports")); ?>">Reports&nbsp;<i class="fa fa-file fa-3x"></i></a>
				
                </li>
               <li class="nav-item">
               
            </li>
				
		  </ul>
            <?php endif; ?>
       
        <ul class="navbar-nav ml-auto">
            <?php if(auth()->guard()->check()): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("logout")); ?>" class="nav-link">
                        Logout&nbsp;<i class="fa fa-sign-in-alt fa-4x"></i> (<?php echo e(Auth::user()->name); ?>)
                    </a>
                </li>
            <?php endif; ?>
           
        </ul>
    </div>
</nav>
<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.querySelector("#menu"),
            botonMenu = document.querySelector("#botonMenu");
        if (menu) {
            botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
        }
    });
</script>
<main class="container-fluid">
    <?php echo $__env->yieldContent("contents"); ?>
</main>
<footer class="px-2 py-2 fixed-bottom bg-dark">
    <span class="text-muted">POINT OF SALE 2022 PRO
        
        <strong>Powered By :</strong>
        <a class="text-white" href="//www.dataxpertsolutions.co.ke">WebXpert Solutions</a> 
        &nbsp;|&nbsp; 
        <a target="_blank" class="text-white" href="//www.dataxpert.co.ke/solutions">
           0723205119
        </a>
    </span>


 
</footer>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/master.blade.php ENDPATH**/ ?>