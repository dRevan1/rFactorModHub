<x-form-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/mod_form.js') }}"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Create {{ $mod_type }} mod</h1>
                        <form method="POST" action="{{ route('mod.store') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="name" class="login-label fw-bold">Vehicle name:</label>
                            <input id="name" class="form-control mt-3 mb-3" placeholder="Enter name" type="text" name="name" :value="old('name')" 
                                required autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            @if (count($categories) > 0)
                                <label for="category" class="login-label fw-bold mt-3">Choose category:</label>    
                                <div class="col-lg-3">
                                    <select class="form-select mt-3 mb-3" id="category" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input id="category" class="form-control" type="hidden" name="category" value="default" required/>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            @endif
                            
                            <div class="row">
                                <img src="/images/car_thumbnail.jpg" class="mod-thumbnail" alt="Thumbnail showcase">
                            </div>
                            <label for="thumbnail" class="login-label fw-bold mt-3">Thumbnail:</label>
                            <input class="form-control mt-3 mb-3" type="file" id="thumbnail" name="thumbnail">
                            <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />

                            <label for="description" class="login-label fw-bold mb-3 mt-3">Description:</label>  
                            <textarea name="description" id="description" placeholder="Write a description here" name="description"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            <button type="submit" class="btn btn-search mt-3">Create</button>
                            <a href="{{ route('mod.index', ['mod_type' => $mod_type]) }}">
                                <button type="button" class="btn btn-create mt-3">Cancel</button>
                            </a>

                            <input id="type" class="form-control" type="hidden" name="type" value="{{ $mod_type }}" required/>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
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
