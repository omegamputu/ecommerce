@extends('layouts.default')

@section('title', 'Se connecter')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3">
                        <form method="POST" action="{{ route('login') }}" class="form-signin needs-validation" novalidate>
                            @csrf
    
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email">{{ __('E-Mail Address') }}</label>
                            </div>
    
                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="current-password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label for="password">Password</label>
                            </div>
    
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
    
                            <p class="mt-2 text-muted text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </p>
                            <p class="text-center">
                                Avez-vous un compte ?<a href="{{ route('register') }}" class="btn btn-link small">S'inscrire</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
