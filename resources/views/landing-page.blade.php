@extends('layouts.app')

@section('title', 'Home')

@section('content')

<header class="masthead" style="background-image: url({{ asset('img/photo-1.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Bienvenu dans notre boutique de livres en ligne.</h1>
            <span class="subheading">Découvrez notre collections des livres.</span>
          </div>
        </div>
      </div>
    </div>
</header>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>BOUTIQUE DE LIVRES EN LIGNE</h2>
                <p class="lead">
                    Le Guide de la documentation en ligne est le plus grand magasin au monde et la plus grande bibliothèque de livres au monde qui contient beaucoup des livres les plus populaires et les plus réputés présentés ici. Les meilleurs auteurs sont ici, il suffit de vous inscrire votre adresse e-mail et d'être mis à jour avec nous.
                </p>
            </div>
        </div>
    </div>
</section>

  
<div id="product">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <a href="{{ route('shop.show', $product->slug) }}">
                            <img class="card-img-top" src="{{ asset('img/books/' . $product->slug. '.jpg') }}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                        <p class="card-text text-center">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                 <a href="{{ route('shop.show', $product->slug) }}" class="btn btn-sm btn-secondary">Afficher details</a>
                                <small class="text-muted">${{ number_format($product->price) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
        <a href="{{ route('shop.index') }}" class="btn btn-primary">Voir d'autres oeuvres</a>
        </div>
    </div>
</div>

<section id="blog" class="container">
    <h1 class="display-4 text-center mb-4">Blog</h1>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">World</strong>
                <h3 class="mb-0">
                <a class="text-dark" href="#">Featured post</a>
                </h3>
                <div class="mb-1 text-muted">Nov 12</div>
                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-success">Design</strong>
                <h3 class="mb-0">
                <a class="text-dark" href="#">Post title</a>
                </h3>
                <div class="mb-1 text-muted">Nov 11</div>
                <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
    </div>
</section>

    
@endsection