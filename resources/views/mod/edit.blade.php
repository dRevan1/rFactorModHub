<x-form-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/mod_form.js') }}"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Edit vehicle</h1>
                        <form method="POST" action="{{ route('vehicle.update', $vehicle) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label for="name" class="login-label fw-bold">Name:</label>
                            <input id="name" class="form-control mt-3 mb-3" placeholder="Enter name" type="text" name="name" value="{{ $vehicle->name }}" 
                                required autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            <label for="category" class="login-label fw-bold mt-3">Choose category:</label>    
                            <div class="col-lg-3">
                                <select class="form-select mt-3 mb-3" id="category" name="category" required>
                                    <option value="F1">F1</option>
                                    <option value="F2">F2</option>
                                    <option value="F3">F3</option>
                                    <option value="F4">F4</option>
                                    <option value="GT2">GT2</option>
                                    <option value="GT3">GT3</option>
                                    <option value="GT4">GT4</option>
                                    <option value="LMP3">LMP3</option>
                                    <option value="LMP2">LMP2</option>
                                    <option value="Hypercar">Hypercar</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="row">
                                <img src="{{ asset($vehicle->thumbnail) }}" class="mod-thumbnail" alt="Thumbnail showcase">
                            </div>
                            <label for="thumbnail" class="login-label fw-bold mt-3">Thumbnail:</label>
                            <input class="form-control mt-3 mb-3" type="file" id="thumbnail" name="thumbnail" value="{{ asset('storage/' . $vehicle->thumbnail) }}">
                            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />

                            <label for="description" class="login-label fw-bold mb-3 mt-3">Description:</label>
                            <textarea name="description" id="description" placeholder="Write a description here" name="description">{{ $vehicle->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            <button type="submit" class="btn btn-search mt-3">Update</button>
                            <a href="{{ route('vehicle.index') }}">
                                <button type="button" class="btn btn-create mt-3">Cancel</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>
            ClassicEditor
                .create(document.querySelector('textarea'))
                .then(editor => {
                    console.log('Editor was initialized', editor);
                })
                .catch(error => {
                    console.error('Error during initialization of the editor', error);
                });
        </script>
</x-form-layout>