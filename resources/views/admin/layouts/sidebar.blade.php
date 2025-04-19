<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="typcn typcn-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-danger">new</div>
            </a>
        </li>

        <!-- Coachs -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('coaches.index') }}">
                <i class="typcn typcn-user menu-icon"></i>
                <span class="menu-title">Coachs</span>
            </a>
        </li>

        <!-- Consultations -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('consultations.index') }}">
                <i class="typcn typcn-messages menu-icon"></i>
                <span class="menu-title">Consultations</span>
            </a>
        </li>
    </ul>
</nav>
