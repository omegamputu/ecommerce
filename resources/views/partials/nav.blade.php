<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">Nos Livres</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}"><span class="fa fa-shopping-cart"></span> 
                            @if (Cart::instance('default')->count())
                                <span class="badge badge-primary">{{ Cart::instance('default')->count() }}</span>
                            @endif
                            Panier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">Nos Livres</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}"><span class="fa fa-shopping-cart"></span> Panier
                            @if (Cart::instance('default')->count())
                                <span class="badge badge-primary">{{ Cart::instance('default')->count() }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Mon Compte</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>

                        </a>
        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Se déconnecter') }}
                            </a>
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
        
                @endguest
                </ul>
            </div>
    </div>
</nav>

