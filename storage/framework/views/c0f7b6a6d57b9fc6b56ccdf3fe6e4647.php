<?php $__env->startSection('content'); ?>
    <section>
       <div class="container min-vh-100-edit p-5">
           <?php if($privacy): ?>
               <?php echo $privacy; ?>

           <?php else: ?>
               <span class="text-primary font-28">No Privacy Policy</span>
           <?php endif; ?>
       </div>
    </section>
    <footer class="footer background--dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-none d-md-block">
                    <ul class="list-unstyled d-flex align-items-center justify-content-center mt-md-4 pb-md-2 mt-4">
                        <li class="me-2 me-sm-4"><a href="" class="text-white"><?php echo app('translator')->get('messages.Home'); ?></a></li>
                        <li class="me-2 me-sm-4"><a href="<?php echo e(route('privacy.index')); ?>" class="text-white"><?php echo app('translator')->get('messages.Privacy Policy'); ?></a></li>
                        <li class="me-2 me-sm-4"><a href="<?php echo e(route('condition.index')); ?>" class="text-white"><?php echo app('translator')->get('messages.Terms and Conditions'); ?></a></li>
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <div class="footer-social d-md-none d-block">
                        <ul class="d-flex align-items-center justify-content-center list-unstyled">
                            <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->name ==='instagram'): ?>
                                    <li class="pb-0 px-2">
                                        <a href="<?php echo e($row->link); ?>" target="_blank" class="">
                                            <i class="fa-brands fa-instagram font-45 text-white"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($row->name ==='whatsapp'): ?>
                                    <li class="pb-0 px-2">
                                        <a href="<?php echo e($row->link); ?>" target="_blank" class="">
                                            <i class="fa-brands fa-whatsapp font-45 text-white"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    
                    
                    
                    
                    
                </div>
                <div class="col-md-12 d-md-none d-block">
                    <ul class="list-unstyled d-block d-md-flex text-center align-items-center justify-content-center mt-md-4 pb-md-2 mt-4">
                        <li class="me-3 me-md-4 d-inline-block"><a href="" class="text-white"><?php echo app('translator')->get('messages.Home'); ?></a></li>
                        <li class="me-3 me-md-4 d-inline-block"><a href="<?php echo e(route('privacy.index')); ?>" class="text-white"><?php echo app('translator')->get('messages.Privacy Policy'); ?></a></li>
                        <li class="me-3 me-md-4 d-inline-block"><a href="<?php echo e(route('condition.index')); ?>" class="text-white"><?php echo app('translator')->get('messages.Terms and Conditions'); ?></a></li>

                    </ul>
                </div>

                <div class="col-12">
                    <div class="background--dark d-md-flex justify-content-between align-items-center">
                        <div class="mt-md-0 mt-4">
                            <p class="mb-2 text-white text-md-start text-center font-12">©2024 <?php echo e(config('app.name')); ?> <span><?php echo app('translator')->get('messages.All rights reserved.'); ?></span></p>
                        </div>
                        <div class="footer-social d-md-block d-none">
                            <ul class="d-flex align-items-center justify-content-center list-unstyled">
                                <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->name ==='instagram'): ?>
                                        <li class="pb-0 px-2">
                                            <a href="<?php echo e($row->link); ?>" target="_blank" class="">
                                                <i class="fa-brands fa-instagram font-20 text-white"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($row->name ==='whatsapp'): ?>
                                        <li class="pb-0 px-2">
                                            <a href="<?php echo e($row->link); ?>" target="_blank" class="">
                                                <i class="fa-brands fa-whatsapp font-20 text-white"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/user/privacy.blade.php ENDPATH**/ ?>