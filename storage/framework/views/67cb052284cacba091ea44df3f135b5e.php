<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <create_menu
            :user="<?php echo e($user); ?>"
            data_request="<?php echo e(route('api.users.categories.DataCategory')); ?>"
            create_request="<?php echo e(route('api.users.categories.store')); ?>"
            edit_request="<?php echo e(route('api.users.categories.UpdateCategory','')); ?>"
            delete_request="<?php echo e(route('api.users.categories.DeleteCategory','')); ?>"
            show_data="<?php echo e(route('api.users.categories.ShowCategory','')); ?>"
            data_request_product="<?php echo e(route('api.users.products.DataProducts','')); ?>"
            create_request_product="<?php echo e(route('api.users.products.store')); ?>"
            edit_request_product="<?php echo e(route('api.users.products.UpdateProduct','')); ?>"
            show_data_product="<?php echo e(route('api.users.products.ShowProduct','')); ?>"
            delete_request_product="<?php echo e(route('api.users.products.DeleteProduct','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></create_menu>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/user/menu/create.blade.php ENDPATH**/ ?>