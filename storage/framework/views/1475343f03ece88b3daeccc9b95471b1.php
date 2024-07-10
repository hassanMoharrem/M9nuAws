<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <default_user
            users_data="<?php echo e(route('api.admin.users.DataUsers')); ?>"
            create_request="<?php echo e(route('api.admin.users.AddUser')); ?>"
            edit_request="<?php echo e(route('api.admin.users.UpdateUser','')); ?>"
            delete_request="<?php echo e(route('api.admin.users.DeleteUser','')); ?>"
            show_data="<?php echo e(route('api.admin.users.ShowUser','')); ?>"
            show_sub="<?php echo e(route('admin.user.show','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></default_user>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/users/users.blade.php ENDPATH**/ ?>