<?php $__env->startSection('content'); ?>
    <main>
        <!--    Start Slider -->
        <section class="vh-100 vh-75-sm bg-image">
            <div class="container h-100">
                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="position-relative h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-md-6">
                                <div class="px-4 px-md-0" data-aos="flip-up" data-aos-duration="1500">
                                    <h4 class="text-white-muted font-bold mt-md-3 mt-5 mb-4 text-uppercase font-45"><?php echo e($row->title_lang); ?></h4>
                                    <a href="" class="hover-button py-3 text-primary border-primary border px-3 rounded-2"><span><?php echo app('translator')->get('messages.try it out now'); ?> <i class="fas fa-link"></i></span></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <figure class="text-end">
                                    <img src="<?php echo e($row->image); ?>" width="100%" height="400" class="text-end contain" data-aos="zoom-in" data-aos-duration="1500"
                                         alt="">
                                </figure>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="custom-shape-divider-bottom-1657716909 d-none d-md-block">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                          class="shape-fill"></path>
                </svg>
            </div>
        </section>
        <!--    End Slider -->
        <!--  Start Why   -->

        <section class="mt-5">
            <div class="container">
                <h2 class="text-center font-28 w-75 mx-auto mb-4 text-primary"><?php echo app('translator')->get('messages.In three simple steps, you will have the quickest,easiest, and most cost- effective solution'); ?></h2>
                <div class="position-relative mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="row justify-content-center">
                                <?php $__currentLoopData = $step; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4 mb-4 mb-md-0">
                                        <div class="border rounded-10 h-100 shadow-sm "  data-aos="fade-up" data-aos-duration="2000">
                                            <img src="<?php echo e($row->image); ?>" class="w-100 cover rounded-top-3" height="200px" alt="">
                                            <div class="p-3 text-start">
                                                <h4 class="font-16 text-primary"><?php echo e($row->title_lang); ?></h4>
                                                <p class="font-14"><?php echo e($row->description_lang); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!--  End Why   -->

        <!--    Start How To Use -->
        <section class="pb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 mb-3">
                        <h2 class="text-primary font-28 my-5 text-center"><?php echo app('translator')->get('messages.The advantages of our digital menu for your business'); ?></h2>
                    </div>
                    <div class="col-md-4">
                        <?php for($i = 0; $i < count($advantage) && $i < 3; $i++): ?>
                            <div class="text-md-end text-center w-75 ms-md-auto me-md-0 mx-auto border-bottom border-muted-arrow mb-3" data-aos="flip-down" data-aos-duration="1000">
                                <div class="relative-position ms-md-auto me-md-0 mx-auto w-h-50 text-end bg-primary d-flex justify-content-center align-items-center rounded-circle">
                                    <i class="<?php echo e($advantage[$i]->icon); ?> text-white font-18"></i>
                                </div>
                                <div class="title-advantage bold mt-2">
                                    <p class="mb-1 font-18"><?php echo e($advantage[$i]->title_lang); ?></p>
                                </div>
                                <div class="desc-advantage">
                                    <p><?php echo e($advantage[$i]->description_lang); ?></p>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <figure data-aos="zoom-in" data-aos-duration="1200">
                            <img src="<?php echo e(asset('assets/site/images/16976201354038_iphone.png')); ?>" width="65%" alt="asdasd" loading="lazy">
                        </figure>
                    </div>
                    <div class="col-md-4">
                        <?php for($i = 3; $i < count($advantage) && $i < 6; $i++): ?>
                        <div class="text-md-start text-center w-75 me-md-auto ms-md-0 mx-auto border-bottom border-muted-arrow mb-3" data-aos="flip-down" data-aos-duration="1000">
                            <div class="relative-position me-md-auto ms-md-0 mx-auto w-h-50 text-md-end text-center bg-primary d-flex justify-content-center align-items-center rounded-circle">
                                <i class="<?php echo e($advantage[$i]->icon); ?> text-white font-18"></i>
                            </div>
                            <div class="title-advantage bold mt-2">
                                <p class="mb-1 font-18"><?php echo e($advantage[$i]->title_lang); ?></p>
                            </div>
                            <div class="desc-advantage">
                                <p><?php echo e($advantage[$i]->description_lang); ?></p>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--    End How To Use -->
    </main>

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

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\localProjects\M9nuAws\resources\views/user/site.blade.php ENDPATH**/ ?>