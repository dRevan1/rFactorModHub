<x-app-layout>
    <div class="container">
        <div class="row main-content">
            <div class="col">
                <div class="row mt-3">
                    <div class="col-xs-12 col-md-5 mt-1">
                        <div class="d-flex flex-column gap-2">
                            <button type="button" class="btn gallery-btn" data-bs-toggle="modal"
                                    data-bs-target="#silverstonePic1">
                                <img src="/public/images/silverstone_1.jpg" alt="silverstone picture 1">
                            </button>
                            <div id="silverstonePic1" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="/public/images/silverstone_1.jpg" class="modal-img" alt="silverstone picture 1">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <button type="button" class="btn gallery-btn" data-bs-toggle="modal"
                                    data-bs-target="#silverstonePic2">
                                <img src="/public/images/silverstone_2.jpg" alt="silverstone picture 2">
                            </button>
                            <div id="silverstonePic2" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="/public/images/silverstone_2.jpg" class="modal-img" alt="silverstone picture 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <button type="button" class="btn gallery-btn" data-bs-toggle="modal"
                                    data-bs-target="#silverstonePic3">
                                <img src="/public/images/silverstone_3.jpg" alt="silverstone picture 3">
                            </button>
                            <div id="silverstonePic3" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="/public/images/silverstone_3.jpg" class="modal-img" alt="silverstone picture 3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-xs-12 col-md-7 mt-2">
                        <p>
                            <span class="item-info">Category:</span> {{ $vehicle->category }}
                        </p>
                        <p>
                            <span class="item-info">Size:</span> 700 mb
                        </p>
                        <p>
                            <span class="item-info">Author:</span> {{ $vehicle->author }}
                        </p>
                        <p>
                            <span class="item-info">Posted:</span> {{ $vehicle->created_at }}
                        </p>
                        <p>
                            <span class="item-info">Last update:</span> {{ $vehicle->updated_at }}
                        </p>
                        <p>
                            <button type="button" class="btn btn-download">
                                Download
                            </button>
                            @auth
                            @if (request()->user()->name === $vehicle->author)
                                <form method="POST" action="{{ route('vehicle.destroy', $vehicle) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-create">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('vehicle.edit', $vehicle) }}">
                                    <button class="btn btn-create mt-3">Edit</button>
                                </a>
                            @endif
                            @endauth
                        </p>
                    </div>
                </div>
    
                <div class="row item-description">
                    <div class="col">
                        <h1> {{ $vehicle->name }} </h1>
                        <p> {{ $vehicle->description }} </p>
                    </div>
                </div>
    
                <div class="row item-comments">
                    <div class="col">
                        <h1>Comments:</h1>
    
                        <div class="form-group textarea-comment mt-4">
                            <textarea class="form-control" rows="5" placeholder="Leave a comment..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>