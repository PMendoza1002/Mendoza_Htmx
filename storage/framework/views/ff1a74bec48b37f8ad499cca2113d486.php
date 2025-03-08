

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card shadow-lg p-4 bg-light">
        <div class="card-body">
            <h1 class="text-center text-primary">Create New Journal Entry</h1>

            <form action="<?php echo e(route('journal.store')); ?>" method="POST" class="mt-4">
                <?php echo csrf_field(); ?>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control" rows="5" required></textarea>
                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success me-2">Save</button>
                    <a href="<?php echo e(route('journal.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Mendoza - Copy\resources\views/journal/create.blade.php ENDPATH**/ ?>