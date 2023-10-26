  

<?php if(session("message")): ?>
    <div class="alert alert-<?php echo e(session('type') ? session("type") : "info"); ?>">
        <?php echo e(session('message')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\laravel-pos\resources\views/notification.blade.php ENDPATH**/ ?>