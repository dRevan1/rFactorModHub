<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/style.css'])
</head>
<body>
<header>
    <!-- Základná štruktúra navbaru zo stránky Bootstrap (hlavne atribúty pre navbar-toggler) https://getbootstrap.com/docs/5.0/components/navbar/? -->
    <nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed" aria-controls="navbarCollapsed" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapsed">
            <ul class="navbar-nav me-auto ms-2">
                <li class="nav-item">
                    <a class="nav-link" id="home-nav" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tracks-nav" href="{{ route('track.index') }}">Tracks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="vehicles-nav" href="{{route('vehicle.index')}}">Vehicles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="setups-nav" href="{{route('setups')}}">Setups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="other-nav" href="{{route('others.index')}}">Other</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <div class="dropdown me-2">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->name }}</button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="auth-nav" href="{{route('login')}}">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();">Log out</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <div class="dropdown me-2">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Log in</button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="auth-nav" href="{{route('login')}}">Log in</a></li>
                                <li><a class="dropdown-item" id="reg-nav" href="{{route('register')}}">Sign up</a></li>
                            </ul>
                        </div>
                    </li>
                @endauth    
            </ul>
        </div>
    </nav>
</header>
<div class="container-fluid mt-3">
    <main>
        {{ $slot }}
    </main>
</div>

<footer>

</footer>
</body>
</html>
