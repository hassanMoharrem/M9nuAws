<?php $__env->startSection('content'); ?>

    <div id="app" class="p-3">
        <profile
            :user_data="<?php echo e($user); ?>"
            user_data_update="<?php echo e(route('api.users.profile.edit')); ?>"
            lang="<?php echo e(app()->getLocale()); ?>"
        ></profile>
    </div>
    <footer class="footer background--dark py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mb-md-5 pb-md-5 mb-4">
                        <li class="me-2 me-sm-4"><a href="" class="text-white"><?php echo app('translator')->get('messages.Home'); ?></a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white"><?php echo app('translator')->get('messages.Privacy Policy'); ?></a></li>
                        <li class="me-2 me-sm-4"><a href="" class="text-white"><?php echo app('translator')->get('messages.Terms and Conditions'); ?></a></li>
                        <li><a href="" class="text-white"><?php echo app('translator')->get('messages.Contact Us'); ?></a></li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="background--dark d-md-flex justify-content-between align-items-center">
                        <div class="footer-social order-md-2">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled">

                                <li class="pb-0 px-2">
                                    <a href="" target="_blank">
                                        <i class="fa-brands fa-instagram font-20 text-white"></i>
                                    </a>
                                </li>
                                <li class="pb-0 px-2">
                                    <a href="" target="_blank">
                                        <i class="fa-brands fa-whatsapp font-20 text-white"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="mt-md-0 mt-4">
                            <p class="mb-2 text-white text-md-start text-center">©2024 <?php echo e(config('app.name')); ?> <span><?php echo app('translator')->get('messages.All rights reserved.'); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/user/profile.blade.php ENDPATH**/ ?>