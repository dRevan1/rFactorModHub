@if (count($collections) === 0)
    <h4>There are no collections available.</h4>
@else
    <h4>{{ count($collections) }} available
        @if (count($collections) === 1)
            collection:
        @else
            collections:
        @endif  
    </h4>
    @foreach ($collections as $collection)
    <div class="card position-relative" style="width: fit-content;">
        <div class="row g-0 align-items-center">
            <div class="col-md-2">
                <img class="img-fluid" src="{{ asset($collection->thumbnail) }}"alt="Collection thumbnail">
            </div>
            <div class="col-md-10">   
                <div class="card-body position-relative">
                    <h2>{{ $collection->name }}</h2>
                    <h4>{{ $collection->mod_count }} mods.</h4>
                </div>
            </div>
        </div>   
    </div>
    @endforeach
@endif