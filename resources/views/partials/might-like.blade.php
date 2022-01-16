@foreach ($mightAlsoLike as $product)
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('shop.show', $product->slug) }}">
                        <img class="card-img-top img-fluid" src="{{ asset('img/books/' . $product->slug. '.jpg') }}" alt="">
                    </a>
                    <div class="text-center">
                        <a href="{{ route('shop.show', $product->slug) }}" class="card-title">{{ $product->name }}</a>
                        <h4>${{ number_format($product->price) }}</h4>
                        <p class="lead">{{ substr($product->description,0,50) }} {{ strlen($product->description) > 50 ? '...' : '' }}</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                            4.0 stars
                    </div>
                </div>
            </div>
        </div>
        
@endforeach