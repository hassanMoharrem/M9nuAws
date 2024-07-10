<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <category
            sub_id = "<?php echo e($user->id); ?>"
            category_data="<?php echo e(route('api.admin.categories.DataCategories',$user->id)); ?>"
            create_request="<?php echo e(route('api.admin.categories.AddCategory')); ?>"
            edit_request="<?php echo e(route('api.admin.categories.UpdateCategory','')); ?>"
            delete_request="<?php echo e(route('api.admin.categories.DeleteCategory','')); ?>"
            show_data="<?php echo e(route('api.admin.categories.ShowCategory','')); ?>"
            show_sub="<?php echo e(route('admin.category.show','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></category>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/users/show.blade.php ENDPATH**/ ?>