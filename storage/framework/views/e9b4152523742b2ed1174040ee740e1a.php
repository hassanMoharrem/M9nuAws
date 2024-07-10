<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <step
            step_data="<?php echo e(route('api.admin.step.DataStep')); ?>"
            create_request="<?php echo e(route('api.admin.step.AddStep')); ?>"
            edit_request="<?php echo e(route('api.admin.step.UpdateStep','')); ?>"
            delete_request="<?php echo e(route('api.admin.step.DeleteStep','')); ?>"
            show_data="<?php echo e(route('api.admin.step.ShowStep','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></step>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/site/step.blade.php ENDPATH**/ ?>