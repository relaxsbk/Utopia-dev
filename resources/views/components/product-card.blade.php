<div class="product-card">
        <img src="{{asset('storage/static/photo/мягкая-игрушка-1.png')}}" alt="{{$product->name}}">
        <div class="product-body">
            <div class="product-title">{{$product->name}}</div>
            <div class="product-category">{{$product->category->name}}</div>

            @if($product->discount > 0)
                <div class="product-price">{{$product->priceDiscount()}} ₽</div>
            @else
                <div class="product-price">{{$product->money()}} ₽</div>
            @endif

            <a href="{{route('product.show', $product)}}" class="product-button">Перейти к товару</a>
        </div>
</div>

