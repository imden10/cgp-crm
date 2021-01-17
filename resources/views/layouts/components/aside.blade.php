<?php
    use Illuminate\Support\Facades\Request;
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/public/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">CGP CRM</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/public/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="{{url('/dashboard')}}" class="nav-link @if(in_array(Request::segment(1),['dashboard']) && Request::segment(2) == '') active @endif">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('companies.index')}}" class="nav-link @if(in_array(Request::segment(2),['companies'])) active @endif">
                        <i class="far fa-building nav-icon"></i>
                        <p>Companies</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('clients.index')}}" class="nav-link @if(in_array(Request::segment(2),['clients'])) active @endif">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link @if(in_array(Request::segment(2),['users'])) active @endif">
                        <i class="fas fa-user-tie nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('api-methods')}}" class="nav-link @if(in_array(Request::segment(2),['api-methods'])) active @endif">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Api methods</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
