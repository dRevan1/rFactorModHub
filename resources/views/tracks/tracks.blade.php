<x-app-layout>
    <head>
        <title>Tracks</title>
    </head>
    
    <script>
        document.getElementById("tracks-nav").classList.add("active");
    </script>
    
    <div class="container">
        <div class="row main-content">
            <div class="row mt-3">
                <div class="col-xs-6 col-md-9 mt-3">
                    <div class="form-group search-bar">
                        <input type="text" class="form-control" id="search-tracks" placeholder="Search...">
                    </div>
                </div>
    
                <div class="col-md-1 mt-3">
                    <button type="button" class="btn btn-search">Submit</button>
                </div>

                @auth
                    <div class="col-md-1 mt-3">
                        <a href="{{ route('track.create') }}">
                            <button type="button" class="btn btn-create">Create</button>
                        </a>
                    </div>
                @endauth
            </div>
            <div class="row mt-3">
                @if (count($tracks) === 0)
                    <h1>There are no tracks available</h1>
                @else
                    <h1>Available tracks</h1>
                @endif
            </div>
    
            <div class="row">
                @if (count($tracks) > 0)
                    @for ($i = 0; $i < count($tracks); $i++)
                        <div class="col-xs-12 col-md-6 mt-4">
                            <div class="card home-card">
                                <a class="card-block stretched-link text-decoration-none" href="{{ route('track.show', $tracks[$i]) }}">
                                    <img class="card-img-top" src="{{ asset($tracks[$i]->thumbnail) }}"
                                         alt="Vehicles oreca 07 link picture">
                                    <div class="card-body">
                                        <h1 class="card-title">{{ $tracks[$i]->name }}</h1>
                                        <h3 class="card-title"> {{ $tracks[$i]->author }} </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
