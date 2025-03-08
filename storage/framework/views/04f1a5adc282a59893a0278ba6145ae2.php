

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <?php if(Auth::check()): ?>
        <div class="card shadow-lg p-4 bg-light">
            <div class="card-body">
                <h1 class="text-center text-primary">Journal Entries</h1>
                <div class="text-end mb-3 position-relative">
                    <!-- HTMX: Load the create form on hover -->
                    <a href="<?php echo e(route('journal.create')); ?>"
                       class="btn btn-success"
                       hx-get="<?php echo e(route('journal.create')); ?>"
                       hx-trigger="mouseenter"
                       hx-target="#create-form-container"
                       hx-swap="innerHTML"
                       hx-trigger-delay="200ms">Create New Entry</a>
                    <!-- Container for the hover form -->
                    <div id="create-form-container" class="position-absolute create-form-dropdown shadow-lg p-3 bg-light rounded"
                         style="display: none; top: 100%; right: 0; z-index: 1000; min-width: 300px;"></div>
                </div>

                <!-- Table will be updated dynamically -->
                <div id="journal-table">
                    <?php echo $__env->make('journal.partials.table', ['journals' => $journals], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center" role="alert">
            <h1>Please log in to see your diary entries.</h1>
        </div>
    <?php endif; ?>
</div>

<style>
    .create-form-dropdown {
        transition: opacity 0.2s ease-in-out;
    }
    .create-form-dropdown:empty {
        display: none;
    }
    .btn-success:hover + #create-form-container {
        display: block;
        opacity: 1;
    }
</style>

<script>
    // Clear the form container when mouse leaves the button or form
    document.addEventListener('mouseleave', function(e) {
        const container = document.getElementById('create-form-container');
        const button = document.querySelector('.btn-success');
        if (!button.contains(e.target) && !container.contains(e.target)) {
            container.innerHTML = '';
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Mendoza - Copy\resources\views/journal/index.blade.php ENDPATH**/ ?>