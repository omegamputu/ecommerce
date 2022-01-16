@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <div class="container">
        <h1 class="display-4">Panier</h1>
        @if (Cart::count() > 0)
            <h4>{{ Cart::count() }} article (s) dans le panier</h4>
            <div class="pb-5">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Produit</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Prix</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantité</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Action</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach (Cart::content() as $item)
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2">
                                                    <img src="{{ asset('img/books/' . $item->model->slug . '.jpg') }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="{{ route('shop.show', $item->model->slug) }}" class="text-dark d-inline-block align-middle">{{ $item->model->name }}</a></h5>
                                                    </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle"><strong>${{ number_format($item->model->price) }}</strong></td>
                                                <td class="border-0 align-middle"><strong>{{ $item->qty }}</strong></td>
                                                {{-- <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i> Remove</a></td> --}}
                                                <td class="border-0 align-middle">
                                                    <div class="btn-group">
                                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                                {{method_field('DELETE')}}
                                                                {{csrf_field()}}
                                                                <input type="submit" class="btn btn-danger" value="Effacer"/>
                                                        </form>
                                                        <form class="ml-1" action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                                {{csrf_field()}}
                                                                <input type="submit" class="btn btn-success" value="Garder pour plus tard"/>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Code promo</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Si vous avez un code de réduction, veuillez le saisir dans la case ci-dessous.</p>
                            <form action="{{ route('coupon.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="text" name="coupon_code" id="coupon_code" placeholder="Appliquer Coupon" aria-describedby="coupon_code" class="form-control border-0">
                                    <div class="input-group-append border-0">
                                        <button id="coupon_code" type="submit" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Appliquer Coupon</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Récapitulatif de la commande </div>
                        <div class="p-4">
                            <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total de la commande </strong><strong>${{ Cart::subtotal() }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>${{ Cart::tax()}}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">${{ Cart::total() }}</h5>
                            </li>
                            </ul><a href="{{ route('checkout.index') }}" class="btn btn-dark rounded-pill py-2 btn-block">Passer à la caisse</a>
                        </div>
                    </div>
                </div>
            </div>
            
        @else 
       <h3> Aucun article dans le panier !</h3>
       <a href="{{route('shop.index')}}" class="btn btn-dark rounded-pill py-2">Continuer vos achats</a>
        @endif

        @if (Cart::instance('saveForLater')->count() > 0)
            <h4 class="mt-4">{{ Cart::instance('saveForLater')->count() }} article (s) garder pour plus tard</h4>
            <div class="pb-5 mt-3">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Produit</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Prix</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Retirer</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach (Cart::instance('saveForLater')->content() as $item)
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2">
                                                    <img src="{{ asset('img/products/' . $item->model->slug . '.jpg') }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="{{ route('shop.show', $item->model->slug) }}" class="text-dark d-inline-block align-middle">{{ $item->model->name }}</a></h5>
                                                    </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle"><strong>${{ number_format($item->model->price) }}</strong></td>
                                                <td class="border-0 align-middle">
                                                    <div class="btn-group">
                                                        <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                                                {{method_field('DELETE')}}
                                                                {{csrf_field()}}
                                                                <input type="submit" class="btn btn-danger" value="Retiré"/>
                                                        </form>
                                                        <form class="ml-1" action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                                                {{csrf_field()}}
                                                                <input type="submit" class="btn btn-success" value="Passer au panier"/>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
            </div>
        @else 
        <h2 class="text-muted">Vous n'avez aucun article sauvegardé pour plus tard</h2>
        @endif
        
        <hr>
        <h1 class="text-center mb-5">Pourrait aussi aimer</h1>
        <div class="row">
            @include('partials.might-like')
        </div>
    </div>
@endsection