<x-app-layout>
    <head>
        <title>Vehicles</title>
    </head>
    
    <script>
        document.getElementById("vehicles-nav").classList.add("active");
    </script>
    
    <div class="container-fluid">
        <div class="row main-content">
            <div class="col-2 left-content">
                <div class="categories-border">
                    <h3>Filters:</h3>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check1" name="option1" value="">
                        <label class="form-check-label">GT4</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check2" name="option2" value="">
                        <label class="form-check-label">GT3</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check3" name="option3" value="">
                        <label class="form-check-label">GT2</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check4" name="option4" value="">
                        <label class="form-check-label">LMP3</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check5" name="option5" value="">
                        <label class="form-check-label">LMP2</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check6" name="option6" value="">
                        <label class="form-check-label">Hypercar</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check7" name="option7" value="">
                        <label class="form-check-label">F1</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check8" name="option8" value="">
                        <label class="form-check-label">F2</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check9" name="option9" value="">
                        <label class="form-check-label">F3</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check10" name="option10" value="">
                        <label class="form-check-label">F4</label>
                    </div>
                    <div class="form-check vehicle-category">
                        <input class="form-check-input" type="checkbox" id="check11" name="option11" value="">
                        <label class="form-check-label">Other</label>
                    </div>
                </div>
            </div>
    
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
                        <a href="{{ route('vehicle.create') }}">
                            <button type="button" class="btn btn-create">Create</button>
                        </a>
                    </div>
                    @endauth
                </div>
    
                <button type="button" class="btn btn-filters mt-3">
                    Filters
                </button>
    
                <div class="row mt-3">
                    @if (count($vehicles) === 0)
                        <h1>There are no vehicles available</h1>
                    @else
                        <h1>Available vehicles</h1>
                    @endif
                </div>
    
                <div class="row main-content">
                    @if (count($vehicles) > 0)
                        @for ($i = 0; $i < count($vehicles); $i++)
                            <div class="col-xs-12 col-md-6 mt-2">
                                <div class="card home-card">
                                    <a class="card-block stretched-link text-decoration-none" href="{{ route('vehicle.show', $vehicles[$i]) }}">
                                        <img class="card-img-top" src="{{ asset($vehicles[$i]->thumbnail) }}"
                                             alt="Vehicle thumbnail">
                                        <div class="card-body">
                                            <h1 class="card-title">{{ $vehicles[$i]->name }}</h1>
                                            <h3 class="card-title"> {{ $vehicles[$i]->author }} </h3>
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