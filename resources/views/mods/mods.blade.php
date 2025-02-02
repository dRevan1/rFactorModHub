<x-app-layout>
    <head>
        <title>{{ $title }}</title>
    </head>
    
    <script>
        document.getElementById("vehicles-nav").classList.add("active");
        let title = document.title;
        document.title = title.charAt(0).toUpperCase() + title.slice(1);
    </script>
    
    <div class="container-fluid">
        <div class="row main-content">
        @if (count($categories) > 0)
            <div class="col-2 left-content">
                <div class="categories-border">
                    <h3>Filters:</h3>
                    @for ($i = 0; $i < count($categories); $i++)
                        <div class="form-check vehicle-category">
                            <input class="form-check-input" type="checkbox" id="check{{ $i }}" name="option{{ $i }}" value="">
                            <label class="form-check-label">{{ $categories[$i] }}</label>
                        </div>
                    @endfor
                </div>
            </div>
        @endif
    
            <div class="col-xs-12 col-md-8">
                <div class="row">
                    <div class="col-xs-6 col-md-9 mt-3">
                        <div class="form-group search-bar">
                            <input type="text" class="form-control" id="search-vehicles" placeholder="Search...">
                        </div>
                    </div>
    
                    <div class="col-md-1 mt-3">
                        <button type="button" class="btn btn-search">Submit</button>
                    </div>

                    @auth
                    <div class="col-md-1 mt-3">
                        <a href="{{ route('mod.create', ['mod_type' => $mod_type]) }}">
                            <button type="button" class="btn btn-create">Create</button>
                        </a>
                    </div>
                    @endauth
                </div>

                @if (count($categories) > 0)
                    <button type="button" class="btn btn-filters mt-3">
                        Filters
                    </button>
                @endif
                
    
                <div class="row mt-3">
                    @if (count($mods) === 0)
                        <h1>There are no {{ $mod_type }}s available</h1>
                    @else
                        <h1>Available {{ $mod_type }}s</h1>
                    @endif
                </div>
    
                <div class="row main-content">
                    @if (count($mods) > 0)
                        @for ($i = 0; $i < count($mods); $i++)
                            <div class="col-xs-12 col-md-6 mt-2">
                                <div class="card home-card">
                                    <a class="card-block stretched-link text-decoration-none" href="{{ route('mod.show', $mods[$i]) }}">
                                        <img class="card-img-top" src="{{ asset($mods[$i]->thumbnail) }}"
                                             alt="Mod thumbnail">
                                        <div class="card-body">
                                            <h1 class="card-title">{{ $mods[$i]->name }}</h1>
                                            <h3 class="card-title"> {{ $mods[$i]->author }} </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>