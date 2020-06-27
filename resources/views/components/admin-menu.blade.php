<div class="text-center border-bottom bg-light text-blue">
    
    <div class="container p-4">

        <i class="fas fa-user-shield fa-2x"></i>
        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
        <small>{{ Auth::user()->username }} (admin)</small>

    </div>

</div>


<div class="container p-4">


    <div class="accordian" id="menu-accordian">

        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                <a class="text-dark" href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="list-group-item">
                <a class="text-dark" href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
            </li>
            <li class="list-group-item">
                <a class="text-dark" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>
            </li>
            <li class="list-group-item">

                
                <a class="" data-toggle="collapse" data-target="#settings-collapse" aria-expanded="true" aria-controls="settings-collapse">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>

                <div id="settings-collapse" class="list-group collapse bg-light" data-parent="#menu-accordian">
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.settings.details') }}">User Details</a>
                    <a class="list-group-item list-group-item-action" href="{{ route('admin.settings.edit-password') }}">Change Password</a>
                </div>

            </li>

        </ul>

    </div>

    {{-- <nav class="nav flex-column">
    
        <a class="nav-link text-dark px-0" href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link text-dark px-0" href="{{ route('notifications.index') }}"><i class="fas fa-bell"></i> Notifications</a>
        <a class="nav-link text-dark px-0" href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>
        <a class="nav-link text-dark px-0" href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i> Settings</a>
    
    </nav> --}}

</div>

