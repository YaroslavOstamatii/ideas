<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest()
                    <li class="nav-item">
                        <a class="{{(Route::is('login')) ? 'active' : ' '}} nav-link" aria-current="page" href="/login">{{__('auth.login')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class=" {{(Route::is('register')) ? 'active' : ' '}} nav-link" href="/register">{{__('auth.register')}}</a>
                    </li>
                @endguest
                @auth()
                    <li class="nav-item">
                        <a class="{{(Route::is('profile')) ? 'active' : ' '}} nav-link" href="{{ route('profile') }}">{{auth()->user()->name}}</a>
                    </li>

                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <li class="nav-item">
                            <input type="submit" class="nav-link text-danger" value="Logout">
                        </li>
                    </form>

                @endauth
            </ul>
        </div>
    </div>
</nav>
