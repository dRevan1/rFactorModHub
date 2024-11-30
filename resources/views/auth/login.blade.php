<x-form-layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Log in</h1>
                        <form method="POST">
                            <div class="form-group">
                                <label for="username" class="login-label fw-bold">Username:</label>
                                <input type="text" class="form-control mt-3 mb-3" id="username" placeholder="Enter username"
                                       required autofocus autocomplete>
    
                                <label for="password" class="login-label fw-bold">Password:</label>
                                <input type="password" class="form-control mt-3" id="password" placeholder="Enter password"
                                       required>
    
                                <button type="submit" class="btn btn-search mt-3">Log in</button>
                            </div>
                        </form>
                        <a href="{{route('register')}}">
                            <button type="button" class="btn btn-create mt-3">New member? Create account here</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-form-layout>
