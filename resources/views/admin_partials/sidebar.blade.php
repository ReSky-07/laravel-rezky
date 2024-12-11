<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}" href="{{ route('admin.home.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Home
                    </a>
                    <a class="nav-link {{ Request::is('admin/about') ? 'active' : '' }}" href="{{ route('admin.about.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        About
                    </a>
                    <a class="nav-link {{ Request::is('admin/skill') ? 'active' : '' }}" href="{{ route('admin.skill.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                        Skill
                    </a>
                    <a class="nav-link {{ Request::is('admin/certificates') ? 'active' : '' }}" href="{{ route('admin.certificates.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-certificate"></i></div>
                        Certificates
                    </a>
                    <a class="nav-link {{ Request::is('admin/projects') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                        Project
                    </a>
                    <a class="nav-link {{ Request::is('admin/contact') ? 'active' : '' }}" href="{{ route('admin.contact.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Contact
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name ?? 'Guest' }}
            </div>
        </nav>
    </div>