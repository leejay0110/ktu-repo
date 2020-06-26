@extends('layouts.admin')


@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
@endsection



@section('nav')
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>

@endsection



@section('content')
    
    {{-- all users --}}
    <div class="card">

        <h5 class="card-header">Users</h5>

        <div class="card-body p-4 p-lg-5">

            <div class="table-responsive">
    
                <table class="table table-striped table-borderless table-hover mb-0" id="all-users">
    
                    <thead>
                        <tr>
                            <th>Name &Tilde; Username</th>
                            <th>Created</th>
                            <th>Active</th>
                        </tr>
                    </thead>
    
                    <tbody>
    
                        @forelse ($users as $user)
    
                            <tr>
                                <td>
                                    {{ $user->name }} &Tilde;
                                    <a href="{{ route('admin.users.show', $user) }}">{{ $user->username }}</a>
                                </td>
                                <td>{{ $user->created_at->isoFormat('LLL') }}</td>
                                <td>
                                    @if ($user->isActive())
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i>
                                            Active
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <i class="fas fa-times-circle"></i>
                                            Deactived
                                        </span>
                                    @endif
                                </td>
                            </tr>
    
                        @empty
    
                            <tr>
                                <td colspan="3">
                                    <i class="fas fa-info-circle"></i> No data found
                                </td>
                            </tr>
                            
                        @endforelse
    
                    </tbody>
    
                </table>
    
            </div>

        </div>


    </div>


@endsection


@section('script')

<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>

<script>

    $(document).ready( function () {
        $('#all-users').DataTable();
    } );

</script>

@endsection