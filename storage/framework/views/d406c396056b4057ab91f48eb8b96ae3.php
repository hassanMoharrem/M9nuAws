<!DOCTYPE html>

<html  lang="<?php echo e(app()->getLocale()); ?>"  class="light-style layout-menu-fixed"  dir="<?php echo e((app()->getLocale() === 'ar') ? 'rtl' : 'ltr'); ?>" data-theme="theme-default" data-assets-path="assets/"
      data-base-url="" data-framework="laravel" data-template="vertical-menu-theme-default-light" >
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Dashboard m9nuAws</title>
    <meta name="description"
          content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!"/>
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="Mgg47nL1bO1MrvfsW5CASO7nQXZniPnUVdWDfC6X">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo.png')); ?>">

    <!-- Include Styles -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/boxiconsc4a7.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/fontawesome5cae.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/flag-icons5883.css')); ?>"/>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js','resources/sass/app.scss']); ?>
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/core.css')); ?>"
          class="template-customizer-core-css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/theme-default.css')); ?>"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/democb2e.css')); ?>"/>


    <link rel="stylesheet"
          href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbarb440.css')); ?>"/>
    <link rel="stylesheet"
          href="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead3881.css')); ?>"/>

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/apex-charts/apex-charts.css')); ?>">


    <!-- Page Styles -->

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- laravel style -->
    <script src="<?php echo e(asset('assets/vendor/js/helpers.js')); ?>"></script>
    <!-- beautify ignore:start -->
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo e(asset('assets/vendor/js/template-customizer.js')); ?>"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>

    <script>
        window.templateCustomizer = new TemplateCustomizer({
            cssPath: '',
            themesPath: '',
            defaultShowDropdownOnHover: true, // true/false (for horizontal layout only)
            displayCustomizer: true,
            lang: 'en',
            pathResolver: function (path) {
                var resolvedPaths = {
                    // Core stylesheets
                    'core.css': '<?php echo e(asset("assets/vendor/css/rtl/core.css?id=30f6a84d4dc0a86dc216aa680dd667cd")); ?>',
                    'core-dark.css': '<?php echo e(asset("assets/vendor/css/rtl/core-dark.css?id=219e84e3d1fac8566672731c35d62d6e")); ?>',

                    // Themes
                    'theme-default.css': '<?php echo e(asset("assets/vendor/css/rtl/theme-default.css?id=2f917d58c88e2f7f1b632fe86d6b21e6")); ?>',
                    'theme-default-dark.css':
                        '<?php echo e(asset("assets/vendor/css/rtl/theme-default-dark.css?id=4a7fa3486f98ff5ea4cc844dea4b56b7")); ?>',
                    'theme-bordered.css': '<?php echo e(asset("assets/vendor/css/rtl/theme-bordered.css?id=bca67194f9d192b8e7d7e8b139dfcae2")); ?>',
                    'theme-bordered-dark.css':
                        '<?php echo e(asset("assets/vendor/css/rtl/theme-bordered-dark.css?id=e4ff4792d65f77e1d21e221534d35fe1")); ?>',
                    'theme-semi-dark.css': '<?php echo e(asset("assets/vendor/css/rtl/theme-semi-dark.css?id=62342f847731afa78c9595579da0e81d")); ?>',
                    'theme-semi-dark-dark.css':
                        '<?php echo e(asset("assets/vendor/css/rtl/theme-semi-dark-dark.css?id=d9b8b306e76164f732f816809db5e358")); ?>',
                }
                return resolvedPaths[path] || path;
            },
            'controls': ["rtl", "style", "layoutType", "showDropdownOnHover", "layoutNavbarFixed", "layoutFooterFixed", "themes"],
        });
    </script>
    <!-- beautify ignore:end -->

</head>

<body>
<!-- Layout Content -->
<div class="layout-wrapper layout-content-navbar ">

    <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

            <!-- ! Hide app brand if navbar-full -->
            <div class="app-brand demo text-center justify-content-center">
                <a href="" class="app-brand-link">
      <span class="app-brand-logo demo mx-auto text-center">
        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" width="55" class="mx-auto rounded" alt="">
      </span>

                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">

                <li class="menu-item <?php echo e(request()->is('admin') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div><?php echo app('translator')->get('messages.Dashboard'); ?></div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text"><?php echo app('translator')->get('messages.Apps & Pages'); ?></span>
                </li>
                <li class="menu-item <?php echo e(request()->is('admin/users') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div><?php echo app('translator')->get('messages.Users'); ?></div>
                    </a>
                </li>
                <li class="menu-item <?php echo e(request()->is('admin/slider') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.slider')); ?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-image"></i>
                        <div><?php echo app('translator')->get('messages.Slider'); ?></div>
                    </a>
                </li>
                <li class="menu-item <?php echo e(request()->is('admin/step') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.step')); ?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-library"></i>
                        <div><?php echo app('translator')->get('messages.Step'); ?></div>
                    </a>
                </li>
                <li class="menu-item <?php echo e(request()->is('admin/advantage') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.advantage')); ?>" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-archive"></i>
                        <div><?php echo app('translator')->get('messages.Advantages'); ?></div>
                    </a>
                </li>

                <li class="menu-item ">
                    <a href="<?php echo e(route('admin.logout')); ?>" class="menu-link">
                        <i class="fa-solid fa-arrow-right-from-bracket me-3 <?php echo e(app()->getLocale() == 'ar' ? 'ms-0' : ''); ?>"></i>
                        <div><?php echo app('translator')->get('messages.LogOut'); ?></div>
                    </a>
                </li>



            </ul>

        </aside>


        <!-- Layout page -->
        <div class="layout-page">


            <!-- BEGIN: Navbar-->
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                 id="layout-navbar">

                <!--  Brand demo (display only for navbar-full and hide on below xl) -->

                <!-- ! Not required for layout-without-menu -->
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                    <ul class="navbar-nav flex-row align-items-center ms-auto <?php echo e(app()->getLocale() == 'ar' ? 'me-0' : ''); ?>">
                        <!-- Language -->
                        <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                        <?php if(app()->getLocale() == 'ar'): ?>
                                <a class="dropdown-item change-lang" href="javascript:void(0)" data-language="en">
                                    <i class="fi fi-gb fis rounded-circle fs-4 me-1"></i>
                                    <span class="align-middle"></span>
                                </a>
                            <?php else: ?>
                                <a class="dropdown-item change-lang" href="javascript:void(0)" data-language="ar">
                                    <i class="fi fi-sa fis rounded-circle fs-4 me-1"></i>
                                    <span class="align-middle"></span>
                                </a>
                         <?php endif; ?>



                        </li>
                        <!--/ Language -->


                        <!-- Style Switcher -->
                        <li class="nav-item me-2 me-xl-0">
                            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                <i class='bx bx-sm'></i>
                            </a>
                        </li>
                        <!--/ Style Switcher -->


                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?php echo e(asset('assets/img/avatars/1.png')); ?>" alt class="w-px-40 h-auto rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="pages/profile-user.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?php echo e(asset('assets/img/avatars/1.png')); ?>" alt
                                                         class="w-px-40 h-auto rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                      <span class="fw-semibold d-block">
                                                John Doe
                                              </span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages/profile-user.html">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="app/invoice/list.html">
                                        <i class="bx bx-credit-card me-2"></i>
                                        <span class="align-middle">Billing</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="auth/login-basic.html">
                                        <i class='bx bx-log-in me-2'></i>
                                        <span class="align-middle">Login</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>

                <!-- Search Small Screens -->
                <div class="navbar-search-wrapper search-input-wrapper  d-none">
                    <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
                           aria-label="Search...">
                    <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                </div>

            </nav>
            <!-- / Navbar -->
            <!-- END: Navbar-->


            <!-- Content wrapper -->
            <?php echo $__env->yieldContent('content'); ?>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!--/ Layout Content -->

<!-- Include Scripts -->
<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery2d24.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/popper/popper7af3.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/bootstrapcfb0.js?id=5cf23b844ba766fd18bf77de6f71daee')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/hammer/hammer9996.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead60e7.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/menu2dc9.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset('assets/js/maine680.js')); ?>"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('assets/js/dashboards-analytics.js')); ?>"></script>
<!-- END: Page JS-->











<script>
    document.addEventListener('DOMContentLoaded', function() {
        const changeLangLinks = document.querySelectorAll('.change-lang');

        changeLangLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const language = this.getAttribute('data-language');

                fetch('/locale', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        locale: language
                    })
                }).then(function(response) {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        console.error('Failed to switch language');
                    }
                }).catch(function(error) {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>

</body>


</html>
<?php /**PATH D:\localProjects\M9nuAws\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>