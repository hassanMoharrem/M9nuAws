<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <advantage
            advantage_data="<?php echo e(route('api.admin.advantage.DataAdvantage')); ?>"
            create_request="<?php echo e(route('api.admin.advantage.AddAdvantage')); ?>"
            edit_request="<?php echo e(route('api.admin.advantage.UpdateAdvantage','')); ?>"
            delete_request="<?php echo e(route('api.admin.advantage.DeleteAdvantage','')); ?>"
            show_data="<?php echo e(route('api.admin.advantage.ShowAdvantage','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></advantage>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/site/advantage.blade.php ENDPATH**/ ?>