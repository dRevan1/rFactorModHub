@if (count($mods) === 0)
    <h4>There are no mods in this collection.</h4>
@else
    <h4>{{ count($mods) }} available
        @if (count($mods) === 1)
            mod:
        @else
            mods:
        @endif  
    </h4>
@endif

@if ($isAuthor)
    <div class="col mt-3 mb-2">
        <a href="#">
            <button type="button" class="btn btn-search">Edit collection</button>
        </a>
    </div>

    <div class="col mt-3 mb-2">
        <a href="{{ route('collections.edit', $collection) }}">
            <button type="button" class="btn btn-search">Update collection mods</button>
        </a>
    </div>

    <div class="col mt-3 mb-2">
        <a href="#">
            <button type="button" class="btn btn-create"><i class="bi bi-trash3"></i></button>
        </a>
    </div>
@endif


@if (count($mods) > 0)
    @foreach ($mods as $mod)
    <div class="card profile-mod-card position-relative mb-1">
        <div class="row align-items-center">
            <div class="col-md-2">
                <img class="img-fluid" src="{{ asset($mod->thumbnail) }}"alt="Mod thumbnail">
            </div>
            <div class="col-md-10">   
                <div class="card-body position-relative">
                <a class="text-decoration-none" href="{{ route('mod.show', $mod) }}">
                    <h2 class="profile-mod-link">{{ $mod->name }}</h2>
                </a>
                </div>
            </div>
        </div>   
    </div>
    @endforeach
@endif