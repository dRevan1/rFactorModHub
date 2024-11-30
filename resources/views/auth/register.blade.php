<x-form-layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Register</h1>
                        <form method="POST">
                            <div class="form-group">
                                <label for="email" class="login-label fw-bold">Email:</label>
                                <input type="email" class="form-control mt-3 mb-3" id="email" placeholder="Enter email"
                                       required autofocus autocomplete>

                                <label for="username-reg" class="login-label fw-bold">Username:</label>
                                <input type="text" class="form-control mt-3 mb-3" id="username-reg" placeholder="Enter username"
                                       required autofocus autocomplete>
    
                                <label for="password-reg" class="login-label fw-bold">Password:</label>
                                <input type="password" class="form-control mt-3 mb-3" id="password-reg" placeholder="Enter password"
                                       required>

                                <label for="password-confirm" class="login-label fw-bold">Confirm password:</label>
                                <input type="password" class="form-control mt-3" id="password-confirm" placeholder="Confirm password"
                                       required>
    
                                <button type="submit" class="btn btn-search mt-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-form-layout>
