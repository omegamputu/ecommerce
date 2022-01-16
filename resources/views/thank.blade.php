@extends('layouts.default')

@section('title', 'Thank you')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto text-center">
               <div class="card">
                   <div class="card-body">
                       <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3">
                            @include('partials.message.flash')
                            <section>
                                <h1>Merci pour <br> Votre paiement!</h1>
                                <p class="lead">Un message de confirmation vous a été envoyé.</p>
                                <a href="{{ url('/') }}" class="btn btn-primary">Page Accueil</a>
                            </section>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
