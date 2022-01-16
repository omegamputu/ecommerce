@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div>
                    <h1 class="my-4">Categories</h1>
                    <div class="list-group">
                        @foreach ($categories as $category)
                            <a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="list-group-item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="my-4">
                    <h1>Prix</h1>
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Moins cher au plus cher</a>
                        <a class="list-group-item" href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">Plus cher au moins cher</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
            <h1 class="my-4">{{ $categoryName }}</h1>
                <div class="row">
                    @forelse ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="div card-body">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('img/books/' . $product->slug. '.jpg') }}" alt="">
                                </a>
                                <div class="text-center">
                                    <a href="{{ route('shop.show', $product->slug) }}" class="card-title">{{ $product->name }}</a>
                                    <h4>${{ number_format($product->price) }}</h4>
                                    <p class="card-text">{{ substr($product->description,0,50) }} {{ strlen($product->description) > 50 ? '...' : '' }}</p>
                                    <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                                    4.0 stars
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="text-center">No item found</div>
                    @endforelse
                </div>
                <ul class="pagination justify-content-center my-4 mb-4">
                    {{ $products->appends(request()->input())->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection