@extends("front.layout")
@section("content")
<div data-scroll-watch="" class="fade_in title">
      <div class="breadcrumbs"><a href="/">首頁</a> / <span>好茶</span></div>
      <h1 class="top_title">Product</h1>
      <div class="top_banner">
        <img src="/images/banner/{{ $banner->photo }}" >
    </div>
    </div>
    <div class="productlist">
        @foreach($list as $data)
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="hover ehover13">
            <a href="/product/detail/{{ $data->type_layer1 }}/{{ $data->id }}">
            <img src="/images/product/{{ $data->photo }}" class="img-responsive">
            <div class="overlay">
              <h2>{{ $data->sub_title }}</h2>
              <p>more <i aria-hidden="true" class="fa fa-leaf"></i></p>
            </div></a></div>
        <p class="product_tit">{{ $data->title }}</p>
      </div>
      @endforeach
    </div>
@endsection