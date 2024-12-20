<x-app-layout>
    <head>
        <title>Home</title>
    </head>
    
    <script>
        document.getElementById("home-nav").classList.add("active");
    </script>
    
    <div class="container">
        <div class="row main-content">
            <div class="row">
                <div class="col">
                    <h1>Welcome to rFactor2 Mod Hub!</h1>
                    <a>Download mods, including tracks, vehicles and other mods, like UI.
                        Maybe you're looking for a specific car setup? You can try setups from our community members.
                        If you're looking to share your mods, feel free to upload here.</a>
                </div>
            </div>
    
            <div class="row">
                <div class="col-xs-12 col-md-6 mt-4">
                    <div class="card home-card">
                        <a class="card-block stretched-link text-decoration-none" href="{{ route('track.index') }}">
                            <img class="card-img-top" src="/images/home_link_tracks.jpg" alt="Tracks link picture">
                            <div class="card-body">
                                <h1 class="card-title">Tracks</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 mt-4">
                    <div class="card home-card">
                        <a class="card-block stretched-link text-decoration-none" href="{{route('vehicle.index')}}">
                            <img class="card-img-top" src="/images/home_link_vehicles.jpg" alt="Vehicles link picture">
                            <div class="card-body">
                                <h1 class="card-title">Vehicles</h1>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-xs-12 col-md-6 mt-4">
                    <div class="card home-card">
                        <a class="card-block stretched-link text-decoration-none" href="{{route('others.index')}}">
                            <img class="card-img-top" src="/images/home_link_other.jpg" alt="Other link picture">
                            <div class="card-body">
                                <h1 class="card-title">Other</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 mt-4">
                    <div class="card home-card">
                        <a class="card-block stretched-link text-decoration-none" href="{{route('setups')}}">
                            <img class="card-img-top" src="/images/home_link_setups.jpg" alt="Setups link picture">
                            <div class="card-body">
                                <h1 class="card-title">Setups</h1>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>