<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'coach' || auth()->user()->role === 'user'): ?>
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                    <i class="typcn typcn-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'user'): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('registered_by_me')); ?>">
                    <i class="typcn typcn-user menu-icon"></i>
                    <span class="menu-title">Mes clients</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'coach'): ?>
            <!-- Consultations (visible for both admin and coach) -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">
                    <i class="typcn typcn-messages menu-icon"></i>
                    <span class="menu-title">Consultations</span>
                </a>
            </li>

            <!-- clinet -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('clients.index')); ?>">
                    <i class="typcn typcn-group menu-icon"></i>
                    <span class="menu-title">Clients</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'admin'): ?>
            <!-- Coachs -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('coaches.index')); ?>">
                    <i class="typcn typcn-user menu-icon"></i>
                    <span class="menu-title">Coachs</span>
                </a>
            </li>

            <!-- Drives -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('drives.index')); ?>">
                    <i class="typcn typcn-folder menu-icon"></i>
                    <span class="menu-title">Drives</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if(auth()->user()->role === 'admin' || auth()->user()->role === 'coach'): ?>
            <!-- Ranks -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('ranks.index')); ?>">
                    <i class="typcn typcn-chart-bar menu-icon"></i>
                    <span class="menu-title">Classement</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('traders.index')); ?>">
                    <i class="typcn typcn-chart-line menu-icon"></i>
                    <span class="menu-title">Traders</span>
                </a>
            </li>
        <?php endif; ?>


    </ul>
</nav>
<?php /**PATH C:\Users\Aicha njimate\OneDrive\Bureau\futureleaders\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>