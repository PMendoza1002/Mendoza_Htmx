<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Date</th>

            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($journal->title); ?></td>
                <td><?php echo e($journal->created_at->format('F j, Y')); ?></td>

                <td class="text-center">
                    <a href="<?php echo e(route('journal.show', $journal->id)); ?>" 
                       class="btn btn-info btn-sm" title="View Entry">View</a>

                    <form action="<?php echo e(route('journal.destroy', $journal->id)); ?>" 
                          method="POST" 
                          class="d-inline"
                          hx-delete="<?php echo e(route('journal.destroy', $journal->id)); ?>"
                          hx-target="#journal-table"
                          hx-swap="innerHTML"
                          hx-confirm="Are you sure you want to delete this entry?">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\xampp\htdocs\Laravel_Mendoza - Copy\resources\views/journal/partials/table.blade.php ENDPATH**/ ?>