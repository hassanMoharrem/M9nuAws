<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <profile
            :user_data="<?php echo e($user); ?>"

            user_data_update="<?php echo e(route('api.users.profile.edit')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></profile>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/user/profile.blade.php ENDPATH**/ ?>