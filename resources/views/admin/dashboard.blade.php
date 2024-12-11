@include ('admin_partials.header')
<!-- Navbar -->
@include ('admin_partials.navigation')
<!-- Sidebar -->
@include ('admin_partials.sidebar')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Welcome to admin page</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Welcome</li>
            </ol>
        </div>
    </main>
    @include ('admin_partials.footer')