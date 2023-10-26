<?php $__env->startSection("title", "Add Users"); ?>
<?php $__env->startSection("contents"); ?>

<br/>
<br/>
<br/>

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Add Users <i class="fa fa-users"></i></h1>
            <form method="POST" action="<?php echo e(route("users.store")); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="label">Name</label>
                    <input required autocomplete="off" name="name" class="form-control"
                           type="text" placeholder="Name">
                </div>
                <div class="form-group">
                    <label class="label">Email</label>
                    <input required autocomplete="off" name="email" class="form-control"
                           type="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label class="label">Password</label>
                    <input required autocomplete="off" name="password" class="form-control"
                           type="password" placeholder="password">
                </div>

                <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-success">Save</button>
                <a class="btn btn-primary" href="<?php echo e(route("users.index")); ?>">Back to List</a>
            </form>
        </div>
    </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/users/users_create.blade.php ENDPATH**/ ?>