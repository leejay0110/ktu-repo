<div class="text-center">
    
    <i class="fas fa-user-shield fa-2x"></i>
    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
    <small>{{ Auth::user()->username }} (admin)</small>

</div>

<hr>

{{-- <nav class="nav flex-column">
    <a class="nav-link text-dark px-0" href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
</nav>

<hr> --}}

<nav class="nav flex-column">

    <a class="nav-link text-dark px-0" href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a class="nav-link text-dark px-0" href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
    <a class="nav-link text-dark px-0" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>
    <a class="nav-link text-dark px-0" href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i> Settings</a>

</nav>


{{-- <div class="row">
    <div class="col-1 col-lg-2"><i class="text-muted fas fa-tachometer-alt"></i></div>
    <div class="col-11 col-lg-10"><a class="text-seconda" href="{{ route('admin.index') }}">Dashboard</a></div>
</div>

<div class="row">
    <div class="col-1 col-lg-2"><i class="text-muted fas fa-bell"></i></div>
    <div class="col-11 col-lg-10"><a class="text-seconda" href="{{ route('notifications.index') }}">Notifications</a></div>
</div>

<div class="row">
    <div class="col-1 col-lg-2"><i class="text-muted fas fa-users"></i></div>
    <div class="col-11 col-lg-10"><a class="text-seconda" href="{{ route('admin.users') }}">Users</a></div>
</div>

<div class="row">
    <div class="col-1 col-lg-2"><i class="text-muted fas fa-cog"></i></div>
    <div class="col-11 col-lg-10"><a class="text-seconda" href="{{ route('admin.settings') }}">Settings</a></div>
</div> --}}

