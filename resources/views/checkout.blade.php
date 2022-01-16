@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Formulaire de commande</h2>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach (Cart::content() as $item)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $item->model->name }}</h6>
                                <small class="text-muted">{{ $item->model->details }}</small>
                            </div>
                            <span class="text-muted">${{ number_format($item->model->price) }}</span>
                        </li>
                    @endforeach
                    
                    @if (session()->has('coupon'))
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-primary">
                                <h6 class="my-0">Tax</h6>
                            </div>
                            <span class="text-primary">${{ $newTax ? $newTax : Cart::tax() }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <div class="d-flex">
                                    <h6 class="my-0">Promo code</h6>
                                    <form action="{{ route('coupon.destroy') }}" method="POST" class="ml-2">
                                        {{ csrf_field() }}
            
                                        {{ method_field('delete') }}
            
                                        <button type="submit" class="btn btn-sm btn-danger">Retiré</button>
                                    </form>
                                </div>
                                <small>{{ session()->get('coupon')['name'] }}</small>
                            </div>
                            <span class="text-success">-${{ $discount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{ $newTotal ? $newTotal : Cart::total() }}</strong>
                        </li>
                    @else 
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-primary">
                                <h6 class="my-0">Tax</h6>
                            </div>
                            <span class="text-primary">${{ Cart::tax() }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{ Cart::total() }}</strong>
                        </li>
                    @endif
                </ul>
        
                @if (! session()->has('coupon'))
                    <form action="{{ route('coupon.store') }}" method="POST" class="card p-2">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Promo code">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">Appliquer</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Adresse de facturation</h4>
                <form action="{{ route('checkout.store') }}" method="POST" class="needs-validation" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        @if (auth()->user())
                             <input type="text" class="form-control" name="billing_name" id="name" placeholder="" value="{{ auth()->user()->name }}" required>
                        @else 
                            <input type="text" class="form-control" name="billing_name" id="name" placeholder="" value="" required>
                        @endif
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="billing_email" value="{{ auth()->user()->email }}" placeholder="you@example.com">
                        @else 
                            <input type="email" class="form-control" name="billing_email" id="email" placeholder="you@example.com">
                        @endif
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="billing_address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                    </div>
        
                    <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" name="billing_address_optional" placeholder="Apartment or suite">
                    </div>
        
                    <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Pays</label>
                        <select class="custom-select d-block w-100" name="billing_country" id="billing_country" required>
                        <option value="">choisir...</option>
                        @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                        Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="city">Ville</label>
                        <input type="text" name="billing_city" class="form-control" placeholder="Ville" required>
                        <div class="invalid-feedback">
                        Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="phone">Téléphone</label>
                        <input type="number" class="form-control" id="phone" name="billing_phone" placeholder="" required>
                        <div class="invalid-feedback">
                        Phone code required.
                        </div>
                    </div>
                    </div>
                    <hr class="mb-4">
                    <div class="d-block my-3">
                        <img src="{{ asset('img/paypal-logo.png') }}" alt="" class="img-fluid">
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continuer la caisse</button>
                </form>
            </div>
        </div>
    </div>
@endsection