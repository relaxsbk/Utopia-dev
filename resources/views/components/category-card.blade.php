<div class="col-md-4 col-lg-2">
    <a href="{{route('categoryWithProducts', $category)}}" class="card custom-card">
        <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">
        <div class="card-body custom-body">
            <h3 class="card-title text-black text-center text-wrap text-break">{{$category['name']}}</h3>
        </div>
    </a>
</div>
