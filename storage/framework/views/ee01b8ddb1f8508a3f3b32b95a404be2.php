<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <privacy
            privacy_data="<?php echo e(route('api.admin.privacy.DataPrivacy')); ?>"
            create_request="<?php echo e(route('api.admin.privacy.AddPrivacy')); ?>"
            edit_request="<?php echo e(route('api.admin.privacy.UpdatePrivacy','')); ?>"
            delete_request="<?php echo e(route('api.admin.privacy.DeletePrivacy','')); ?>"
            show_data="<?php echo e(route('api.admin.privacy.ShowPrivacy','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></privacy>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/site/privacy.blade.php ENDPATH**/ ?>