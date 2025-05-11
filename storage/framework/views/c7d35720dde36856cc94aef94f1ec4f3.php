<style>
    /* Navbar */
.navbar {
    background: linear-gradient(90deg, #EFEBE9FF, #F7F5F3FF);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-bottom: 4px solid #ffffff1a;
}

.navbar-brand-wrapper {
    background-color: transparent;
}

.navbar .navbar-brand img {
    height: 40px;
}

/* Icônes */
.navbar .typcn {
    font-size: 20px;
    color: white;
}

/* Dropdown menu */
.dropdown-menu {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.dropdown-item:hover {
    background-color: #f5f5f5;
}

/* Profile name */
.nav-profile-name {
    font-weight: 600;
    color: #333;
}

</style>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="<?php echo e(route('dashboard')); ?>"><img
                    src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('dashboard')); ?>"><img
                    src="<?php echo e(asset('assets/images/logo_hor.png')); ?>" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <ul class="navbar-nav navbar-nav-right">
            

            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                    id="messageDropdown" href="#" data-bs-toggle="dropdown">
                    
                    <i class="typcn typcn-cog-outline mx-0"></i>
                 
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                    aria-labelledby="messageDropdown">
                    
                    <!-- Changed 'float-start' to 'text-start' -->

                    <!-- Profile Info -->
                    <a class="dropdown-item preview-item" href="#">
                        <div class="preview-item-content d-flex align-items-center">
                            <i class="typcn typcn-user-outline text-primary me-2"></i>
                            <span class="nav-profile-name"><?php echo e(Auth::user()->name); ?></span>
                        </div>
                    </a>

                    <!-- Divider -->
                    <div class="dropdown-divider"></div>

                    <!-- Logout -->
                    <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item preview-item w-100 text-start">
                            <div class="preview-item-content d-flex align-items-center">
                                <i class="typcn typcn-eject text-primary me-2"></i>
                                <span>Logout</span>
                            </div>
                        </button>
                    </form>
                </div>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
<?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/admin/layouts/navbar.blade.php ENDPATH**/ ?>