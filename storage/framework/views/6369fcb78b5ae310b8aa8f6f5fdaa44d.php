

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card shadow-lg p-4 bg-light">
        <div class="card-body">
            <h1 class="text-center text-primary"><?php echo e($journal->title); ?></h1>
            <p class="mt-3 text-dark"><?php echo e($journal->content); ?></p>
            <div class="d-flex justify-content-center mt-4">
                <a href="<?php echo e(route('journal.edit', $journal->id)); ?>" class="btn btn-warning me-2">Edit</a>
                <form action="<?php echo e(route('journal.destroy', $journal->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Mendoza - Copy\resources\views/journal/show.blade.php ENDPATH**/ ?>