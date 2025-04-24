<div class="product-card">
    @php
        $mainImage = $product->images->where('position', 0)->first();
    @endphp
    @if($mainImage === null)
        <img src="{{asset('storage/static/photo/мягкая-игрушка-2-1.png')}}" alt="{{$product->name}}">
    @else
        <img src="{{asset($mainImage->url)}}" class="" alt="{{$product->name}}">

    @endif
        <div class="product-body">
            <div class="product-title">{{$product->name}}</div>
            <div class="product-category">{{$product->category->name}}</div>

            @if($product->discount > 0)
                <div class="product-price">{{$product->priceDiscountFormatted()}} ₽</div>
            @else
                <div class="product-price">{{$product->money()}} ₽</div>
            @endif

            <a href="{{route('product.show', $product)}}" class="product-button">Перейти к товару</a>
        </div>
</div>

