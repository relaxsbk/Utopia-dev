<div>
    <a href="{{route('catalog.show', $catalog)}}" class="card custom-card">
        <img src="{{$catalog->image}}" class="card-img-top" alt="Lego">
        {{--                <img src="http://yao.goguynet.jp/wp-content/uploads/sites/17/2017/12/840945.jpg" class="card-img-top" alt="Lego">--}}
        <div class="card-body custom-body">
            <h3 class="card-title text-black text-center text-wrap text-break">{{$catalog->name}}</h3>
        </div>
    </a>
</div>
