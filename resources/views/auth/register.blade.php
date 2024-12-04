<x-form-layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Register</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="login-label fw-bold">Email:</label>
                                <x-text-input id="email" type="email" class="form-control mt-3 mb-3" placeholder="Enter email" type="email" name="email" :value="old('email')"
                                       required autofocus autocomplete="email"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <label for="name" class="login-label fw-bold">Username:</label>
                                <x-text-input id="name" class="form-control mt-3 mb-3" placeholder="Enter username" type="text" name="name" :value="old('name')"
                                       required autofocus autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
    
                                <label for="password" class="login-label fw-bold">Password:</label>
                                <x-text-input id="password" class="form-control mt-3 mb-3" placeholder="Enter password" type="password" name="password"
                                       required autocomplete="new-password"/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <label for="password_confirmation" class="login-label fw-bold">Confirm password:</label>
                                <x-text-input id="password_confirmation" class="form-control mt-3" placeholder="Confirm password" type="password" name="password_confirmation"
                                    required autocomplete="new_password"/>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    
                                <button type="submit" class="btn btn-search mt-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-form-layout>