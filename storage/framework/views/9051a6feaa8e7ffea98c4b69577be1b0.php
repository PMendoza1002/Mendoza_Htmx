

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <?php if(Auth::check()): ?>
        <div class="card shadow-lg p-4 bg-light">
            <div class="card-body">
                <h1 class="text-center text-primary">Journal Entries</h1>
                <div class="text-end mb-3">
                    <a href="<?php echo e(route('journal.create')); ?>" class="btn btn-success">Create New Entry</a>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($journal->title); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('journal.show', $journal->id)); ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="<?php echo e(route('journal.edit', $journal->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?php echo e(route('journal.destroy', $journal->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center" role="alert">
            <h1>Please log in to see your diary entries.</h1>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Mendoza\resources\views/journal/index.blade.php ENDPATH**/ ?>