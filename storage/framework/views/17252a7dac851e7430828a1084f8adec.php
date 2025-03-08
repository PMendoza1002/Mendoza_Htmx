

<?php $__env->startSection('content'); ?>
<div class="container">
<h1>Create New Journal Entry</h1>

<form action="<?php echo e(route('journal.store')); ?>" method="POST">

        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
<label for="content">Content</label> <!-- This can be updated if needed -->

            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Mendoza\resources\views/journal/create.blade.php ENDPATH**/ ?>