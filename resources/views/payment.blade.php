@extends('layouts.default')

@section('title', 'Paiement')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3">
                            <div class="alert alert-primary my-4" role="alert">
                              Grâce à <a href="https://www.paypal.com" class="alert-link" target="blank">Paypal </a>, payer en ligne en toute <strong>simplicité</strong> et <strong>sécurité</strong>.
                            </div>
                            <img src="{{ asset('img/paypal-logo.png') }}" alt="" class="img-fluid">
                            <form class="form-inline" action="{{ route('paypal') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group mb-2">
                                    <small class="text-muted">Montant à payer</small>
                                  </div>
                                  <div class="form-group mx-sm-3 mb-2">
                                    <label for="amount" class="sr-only">Montant</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="dollard">$</span>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="amount" value="{{ (int) Cart::total() }}" id="amount" placeholder="Montant">
                                  </div>
                                  <button type="submit" class="btn btn-primary mb-2">Confirmer le paiement</button>

                                {{-- <div class="d-block my-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="dollard">$</span>
                                                </div>
                                                <input type="text" class="form-control" id="amount" name="amount" value="{{ (int) Cart::total() }}" placeholder="" required>
                                                <div class="invalid-feedback">
                                                    The payment amount is required
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit">Valider</button>
                                    <a href="{{ route('cart.index') }}" class="btn btn-secondary btn-lg">Annuler</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>    
@endsection

