@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="row mb-4 my-5">
        <div class="col-md-4 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid" src="{{ asset('img/books/' . $product->slug. '.jpg') }}" width="300" height="200" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="my-3">{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <h3 class="my-3">Détail du produit</h3>
            <span>{{ $product->details }}</span>
            <span class="text-muted">${{ number_format($product->price) }}</span>
            @if ($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>
            @endif
        </div>
    </div>
    <hr>
    <h1 class="text-center mb-5 my-4">Pourrait vous intéressez</h1>
    <div class="row">
        @include('partials.might-like')
    </div>
    </div>
@endsection