<x-app-layout>
    <head>
        <title>Others</title>
    </head>
    
    <script>
        document.getElementById("other-nav").classList.add("active");
    </script>
    
    <div class="container-fluid">
        <div class="row main-content">
            <div class="col-2 left-content">
                <div class="categories-border">
                    <h3>Filters:</h3>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check1" name="option1" value="">
                        <label class="form-check-label">Skins</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check2" name="option2" value="">
                        <label class="form-check-label">HUD</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check3" name="option3" value="">
                        <label class="form-check-label">Sounds</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check4" name="option4" value="">
                        <label class="form-check-label">Other</label>
                    </div>
                </div>
            </div>
    
            <div class="col-xs-12 col-md-8">
                <div class="row">
                    <div class="col-xs-6 col-md-9 mt-3">
                        <div class="form-group search-bar">
                            <input type="text" class="form-control" id="search-others" placeholder="Search...">
                        </div>
                    </div>
    
                    <div class="col-md-1 mt-3">
                        <button type="button" class="btn btn-search">Submit</button>
                    </div>

                    @auth
                    <div class="col-md-1 mt-3">
                        <a href="{{ route('others.create') }}">
                            <button type="button" class="btn btn-create">Create</button>
                        </a>
                    </div>
                    @endauth
                </div>
    
                <button type="button" class="btn btn-filters mt-3">
                    Filters
                </button>
    
                <div class="row mt-3">
                    @if (count($others) === 0)
                        <h1>There are no mods available here</h1>
                    @else
                        <h1>Available mods</h1>
                    @endif
                </div>
    
                <div class="row main-content">
                    @if (count($others) > 0)
                        @for ($i = 0; $i < count($others); $i++)
                            <div class="col-xs-12 col-md-6 mt-2">
                                <div class="card home-card">
                                    <a class="card-block stretched-link text-decoration-none" href="{{ route('others.show', $others[$i]) }}">
                                        <img class="card-img-top" src="/images/home_link_other.jpg"
                                             alt="Vehicles oreca 07 link picture">
                                        <div class="card-body">
                                            <h1 class="card-title">{{ $others[$i]->name }}</h1>
                                            <h3 class="card-title"> {{ $others[$i]->author }} </h3>
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