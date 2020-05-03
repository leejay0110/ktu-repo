@if (session('error'))

    <div class="alert alert-danger fade show border-top-0 border-left-0 border-right-0 rounded-0 mb-0" role="alert">

        <div class="container">

            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>

    </div>

@endif

@if (session('success'))

    <div class="alert alert-success fade show border-top-0 border-left-0 border-right-0 rounded-0 mb-0" role="alert">

        <div class="container">

            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>

    </div>

@endif