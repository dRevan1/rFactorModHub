<x-form-layout>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card login-card my-5 p-4">
                    <div class="card-body">
                        <h1 class="card-title text-center">Log in</h1>

                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login')}}">
                            @csrf

                            <label for="name" class="login-label fw-bold">Username:</label>
                            <x-text-input id="name" class="form-control mt-3 mb-3" placeholder="Enter username" type="text" name="name" :value="old('username')" 
                                required autofocus autocomplete="username"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            <label for="password" class="login-label fw-bold">Password:</label>
                            <x-text-input id="password" type="password" class="form-control mt-3" placeholder="Enter password" type="password" name="password"
                                required autocomplete="current-password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            <button type="submit" class="btn btn-search mt-3">Log in</button>
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