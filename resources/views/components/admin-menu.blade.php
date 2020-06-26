<div class="text-center border-bottom bg-light text-blue">
    
    <div class="container p-4">

        <i class="fas fa-user-shield fa-2x"></i>
        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
        <small>{{ Auth::user()->username }} (admin)</small>

    </div>

</div>


<div class="container p-4">

    <nav class="nav flex-column">
    
        <a class="nav-link text-dark px-0" href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link text-dark px-0" href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
        <a class="nav-link text-dark px-0" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>
        <a class="nav-link text-dark px-0" href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i> Settings</a>
    
    </nav>

</div>

