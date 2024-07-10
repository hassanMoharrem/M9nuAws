<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <product
            sub_id = "<?php echo e($category->id); ?>"
            product_data="<?php echo e(route('api.admin.products.DataProducts',$category->id)); ?>"
            create_request="<?php echo e(route('api.admin.products.AddProduct')); ?>"
            edit_request="<?php echo e(route('api.admin.products.UpdateProduct','')); ?>"
            delete_request="<?php echo e(route('api.admin.products.DeleteProduct','')); ?>"
            show_data="<?php echo e(route('api.admin.products.ShowProduct','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></product>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>