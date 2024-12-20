<!-- Základná štruktúra navbaru zo stránky Bootstrap (hlavne atribúty pre navbar-toggler) https://getbootstrap.com/docs/5.0/components/navbar/? -->
<nav class="navbar navbar-expand-sm">
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed" aria-controls="navbarCollapsed" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapsed">
            <ul class="navbar-nav">
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
                <li class="nav-item">
                    <a class="nav-link" id="auth-nav" href="{{route('login')}}">Log in</a>
                </li>
            </ul>
        </div>
    </nav>