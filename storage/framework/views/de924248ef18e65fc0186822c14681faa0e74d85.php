<?php $__env->startSection("titulo", "Editar usuario"); ?>
<?php $__env->startSection("contenido"); ?>
    <div class="row">
        <div class="col-12">
            <h1>Editar usuario</h1>
            <form method="POST" action="<?php echo e(route("usuarios.update", [$usuario])); ?>">
                <?php echo method_field("PUT"); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="<?php echo e($usuario->name); ?>" autocomplete="off" name="name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Correo electrónico</label>
                    <input required value="<?php echo e($usuario->email); ?>" autocomplete="off" name="email" class="form-control"
                           type="email" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                    <label class="label">Contraseña</label>
                    <input required value="<?php echo e($usuario->password); ?>" autocomplete="off" name="password"
                           class="form-control"
                           type="password" placeholder="Contraseña">
                </div>

                <?php echo $__env->make("notificacion", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="<?php echo e(route("usuarios.index")); ?>">Volver</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("maestra", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/users/users_edit.blade.php ENDPATH**/ ?>