<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- base:css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendors/typicons/typicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendors/css/vendor.bundle.base.css')); ?>">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <!-- endinject -->

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('admin/assets/images/favicon.ico')); ?>" />
</head>

<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="main-panel">

                <div class="content-wrapper">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- content-wrapper ends -->

                <!-- Footer -->
                <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="<?php echo e(asset('admin/assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->

    <!-- Plugin js for this page-->
    <script src="<?php echo e(asset('admin/assets/vendors/chart.js/chart.umd.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/jquery.cookie.js')); ?>"></script>
    <!-- End plugin js for this page-->

    <!-- inject:js -->
    <script src="<?php echo e(asset('admin/assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/template.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/todolist.js')); ?>"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="<?php echo e(asset('admin/assets/js/dashboard.js')); ?>"></script>
    <!-- End custom js for this page-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\lahce\Downloads\futureleaders\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>