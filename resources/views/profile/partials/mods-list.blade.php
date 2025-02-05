
@if (count($mods) === 0)
    <h4>There are no {{ $mod_type }}s available.</h4>
@else
    <h4>{{ count($mods) }} available {{ $mod_type }}
        @if (count($mods) === 1)
            mod:
        @else
            mods:
        @endif  
    </h4>
    @foreach ($mods as $mod)
    <div class="card position-relative">
            <div class="row g-0 align-items-center">
            <div class="col-md-2">
                <img class="img-fluid" src="{{ asset($mod->thumbnail) }}"alt="Mod thumbnail">
            </div>
            <div class="col-md-10">   
                <div class="card-body position-relative">
                <a class="text-decoration-none" href="{{ route('mod.show', $mod) }}">
                    <h2 class="profile-mod-link">{{ $mod->name }}</h2>
                </a>
                @if ($isAuthor)
                    <a href="{{ route('mod.edit', $mod) }}">
                        <button class="btn btn-search"><i class="bi bi-pencil-square"></i></button>
                    </a>
                    <div class="position-relative" style="z-index: 1;">
                        <form method="POST" action="{{ route('mod.destroy', $mod) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-create mt-3">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                @endif
                </div>
            </div>
            </div>   
    </div>
    @endforeach
@endif