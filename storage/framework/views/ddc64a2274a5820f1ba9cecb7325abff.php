<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <condition
            condition_data="<?php echo e(route('api.admin.condition.DataCondition')); ?>"
            create_request="<?php echo e(route('api.admin.condition.AddCondition')); ?>"
            edit_request="<?php echo e(route('api.admin.condition.UpdateCondition','')); ?>"
            delete_request="<?php echo e(route('api.admin.condition.DeleteCondition','')); ?>"
            show_data="<?php echo e(route('api.admin.condition.ShowCondition','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></condition>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/site/condition.blade.php ENDPATH**/ ?>