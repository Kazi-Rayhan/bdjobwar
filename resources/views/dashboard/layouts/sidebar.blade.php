<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home_page') }}">

        <div class="sidebar-brand-text mx-3">Bd Jobwar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->



    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('exams') }}">
            <i class="fab fa-pied-piper"></i>
            <span>Your Exams</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders') }}">
            <i class="fas fa-file-invoice-dollar"></i>
            <span>Your Orders</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('courses') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Your Courses</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('favourites') }}">
            <i class="fas fa-heart"></i>
            <span>Your Favourites</span></a>
    </li>
    @if (auth()->user()->information->package->paid == true)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('package') }}">
                <i class="fas fa-box"></i>
                <span>Subscribed Package</span></a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('editprofile') }}">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('home_page') }}">
            <i class="fas fa-home"></i>
            <span>Back to home</span></a>
    </li>

    <!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('testHistory') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Test history</span></a>
</li> -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="fas fa-toggle-off mr-3"></span>Sign Off</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>




</ul>
