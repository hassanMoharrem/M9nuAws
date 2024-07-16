<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <social
            social_data="<?php echo e(route('api.admin.social.DataSocial')); ?>"
            create_request="<?php echo e(route('api.admin.social.AddSocial')); ?>"
            edit_request="<?php echo e(route('api.admin.social.UpdateSocial','')); ?>"
            delete_request="<?php echo e(route('api.admin.social.DeleteSocial','')); ?>"
            show_data="<?php echo e(route('api.admin.social.ShowSocial','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></social>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/site/social.blade.php ENDPATH**/ ?>