<?php $__env->startSection("title", "Users"); ?>
<?php $__env->startSection("contents"); ?>

<br/>
<br/>
<br/>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Users <i class="fa fa-users"></i></h1>
            <a href="<?php echo e(route("users.create")); ?>" class="btn btn-success mb-2">Add User</a>
            <?php echo $__env->make("notification", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td>
                                <a class="btn btn-warning" href="<?php echo e(route("users.edit",[$user])); ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="<?php echo e(route("users.destroy", [$user])); ?>" method="post">
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
            </div>
        </div>
    </div>
	
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/users/users_index.blade.php ENDPATH**/ ?>