@extends('layouts.default')

@section('title', 'Valider votre compte')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="position-relarive overflow-hidden p-3 p-md-5 m-md-3">
                         @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </div>
                        @endif

                        {{ __('Avant de continuer, veuillez vérifier votre courrier électronique pour un lien de vérification.') }}
                        {{ __('Si vous n\'avez pas reçu l\'email') }}, <a href="{{ route('verification.resend') }}">
                            {{ __('cliquez ici pour demander un autre.') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


