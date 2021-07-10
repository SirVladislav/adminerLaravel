<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/main" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white"></a></li>
                <li><a href="#" class="nav-link px-2 text-white">Hello, {{ session()->get('username') }}  ID: {{ session()->get('user_id') }} </a></li>
                @if(session()->get('isAdmin'))
                <li><a href="{{ route('adminpanel') }}" class="nav-link px-2 text-white">Admin Panel</a></li>
                @endif
            </ul>

            <form class="text-end" method="POST" action="{{route('logout')}}">
                <!-- nelzya prosto logout??? -->
                @csrf
                <button type="submit" class="btn btn-danger">Log-out</button>
            </form>
        </div>
    </div>
</header>