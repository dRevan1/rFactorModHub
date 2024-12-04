<x-form-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Log in</h1>
                        <form method="POST" action="">
                            @csrf
                            <label for="name" class="login-label fw-bold">Name:</label>
                            <input id="name" class="form-control mt-3 mb-3" placeholder="Enter name" type="text" name="name" :value="old('name')" 
                                required autofocus autocomplete="name"/>

                            <textarea name="editor" placeholder="Write description here"></textarea>

                            <button type="submit" class="btn btn-search mt-3">Create</button>
                        </form>

                        <a href="{{route('register')}}">
                            <button type="button" class="btn btn-create mt-3">New member? Create account here</button>
                        </a>
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
