@extends("front.layout")
@section("content")
<video autoplay="true" muted="true" loop="true" preload="auto" style="width: 100%; height: auto;">
        <source src="images/index/index_video.mp4" type="video/mp4">
        <source src="images/index/index_video.ogv" type="video/ogv">
    </video>
    <div class="index_banner"><img src="images/index/index_video.jpg" style="width: 100%"></div>
    <div class="index-list">
        @foreach($product as $data)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hover ehover13">
                <a href="/product/detail/{{ $data->type_layer1 }}/{{ $data->id }}">
                    <img src="/images/product/{{ $data->photo }}" class="img-responsive">
                    <div class="overlay">
                        <h2>{{ $data->sub_title }}</h2>
                        <p>more <i aria-hidden="true" class="fa fa-leaf"></i></p>
                    </div>
                </a></div>
            <p class="product_tit">{{ $data->title }}</p>
        </div>
        @endforeach
    </div>
    @endsection