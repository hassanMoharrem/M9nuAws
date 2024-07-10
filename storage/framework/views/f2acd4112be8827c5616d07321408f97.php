<?php $__env->startSection('content'); ?>
    <div id="app" class="p-3">
        <slider
            slider_data="<?php echo e(route('api.admin.slider.DataSlider')); ?>"
            create_request="<?php echo e(route('api.admin.slider.AddSlider')); ?>"
            edit_request="<?php echo e(route('api.admin.slider.UpdateSlider','')); ?>"
            delete_request="<?php echo e(route('api.admin.slider.DeleteSlider','')); ?>"
            show_data="<?php echo e(route('api.admin.slider.ShowSlider','')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></slider>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/site/slider.blade.php ENDPATH**/ ?>