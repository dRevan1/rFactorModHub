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
@endif

@if ($isAuthor)
    <div class="col mt-3 mb-2">
        <button type="button" class="btn btn-search collection-modal">Create collection</button>
        <div class="collection-error-msg">

        </div>
    </div>
@endif

@if (count($collections) > 0)
    @foreach ($collections as $collection)
    <div class="card collection-card position-relative">
        <div class="row g-0 align-items-center">
            <div class="col-md-2">
                <img class="img-fluid" src="{{ asset($collection->thumbnail) }}"alt="Collection thumbnail">
            </div>
            <div class="col-md-10">   
                <div class="card-body position-relative">
                    <h2 class="collection-name">{{ $collection->name }}</h2>
                    <h4>{{ $collection->mod_count }} mods.</h4>
                </div>
            </div>
        </div>   
    </div>
    @endforeach
@endif

@include('profile.partials.collection-create-form')

<script>
    $(document).ready(function () {
        $('#createForm').submit(function (e) {
            e.preventDefault();

            let collectionData = {
                name: $('#name').val(),
                description: $('#description').val(),
                thumbnail: $('#thumbnail').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                url: "/collections",
                type: "POST",
                data: collectionData,
                success: function (response) {
                    $('#createModal').modal('hide');
                    location.reload();
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = "Failed to create collection.\n";
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + "\n";
                    });
                    alert(errorMessage);
                }
            });
        });


        $('.collection-modal').click(function (e) {
            e.preventDefault(); //aby nebol refresh
            $('#createModal').modal('show');
        });
    });
</script>