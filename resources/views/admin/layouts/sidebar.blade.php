<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'coach' || auth()->user()->role === 'user')
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="typcn typcn-home menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'user')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('registered_by_me') }}">
                    <i class="typcn typcn-user menu-icon"></i>
                    <span class="menu-title">Mes clients</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'coach')
            <!-- Consultations (visible for both admin and coach) -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('consultations.index') }}">
                    <i class="typcn typcn-messages menu-icon"></i>
                    <span class="menu-title">Consultations</span>
                </a>
            </li>

            <!-- clinet -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">
                    <i class="typcn typcn-group menu-icon"></i>
                    <span class="menu-title">Clients</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'admin')
            <!-- Coachs -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('coaches.index') }}">
                    <i class="typcn typcn-user menu-icon"></i>
                    <span class="menu-title">Coachs</span>
                </a>
            </li>

            <!-- Drives -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('drives.index') }}">
                    <i class="typcn typcn-folder menu-icon"></i>
                    <span class="menu-title">Drives</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'admin' || auth()->user()->role === 'coach')
            <!-- Ranks -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ranks.index') }}">
                    <i class="typcn typcn-chart-bar menu-icon"></i>
                    <span class="menu-title">Classement</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('traders.index') }}">
                    <i class="typcn typcn-chart-line menu-icon"></i>
                    <span class="menu-title">Traders</span>
                </a>
            </li>
        @endif


    </ul>
</nav>
