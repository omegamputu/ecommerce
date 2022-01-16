@extends('layouts.default')

@section('title', 'Créer un compte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3">
                        <form method="POST" action="{{ route('register') }}" class="form-signin needs-validation" novalidate>
                            @csrf
    
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name" autocomplete="name" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="name">{{ __('Name') }}</label>
                            </div>
    
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
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <label for="password">Password</label>
                            </div>
    
                            <div class="form-label-group">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>
    
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                            <p class="text-center">
                                Vous avez déjà un compte ?<a href="{{ route('login') }}" class="btn btn-link small">Se connecter</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
