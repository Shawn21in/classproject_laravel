@extends("front.layout")
@section("content")
<div data-scroll-watch="" class="fade_in title">
    <div class="breadcrumbs"><a href="index.html">首頁

        </a> / <a href="/product/{{ $type_layer1->id }}">{{ $type_layer1->type_layer1_name }}</a> / <span>{{ $product->title }}</span></div>
</div>
<div id="product_detail">
    <div class="main_info">
        <div class="main_pic">
            @if(!empty($photo) && sizeof($photo) >0 )
            <div class="m_pic"><img id="zoom_03" src="/images/product/M/{{ $photo[0]->photo }}" data-zoom-image="/images/product/{{ $photo[0]->photo }}"></div>
            <div id="thumb_pic">
                <ul id="gallery_01">
                    @foreach($photo as $data)
                    <li>
                        <a href="#" data-image="/images/product/M/{{ $data->photo }}" data-zoom-image="/images/product/{{ $data->photo }}"><img id="zoom_03" src="/images/product/S/{{ $data->photo }}">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="right_info">
            <h3 class="product_tit">{{ $product->title }}</h3>
            <p class="subtitle">{{ $product->sub_title }}</p>
            @if(!empty($spec) && sizeof($spec) > 0)
            <table class="prod_table">
                @foreach($spec as $data)
                <tr>
                    <th></th>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->content }}</td>
                </tr>
                @endforeach
            </table>
            @endif

            @if(!empty($shop) && sizeof($shop) > 0)
            <div class="shop_link">
                <h6>買好茶</h6>
                @foreach($shop as $data)
                </a><a href="{{ $data->url }}" target="blank">
                    <p>{{ $data->shopName }}</p>
                </a>
                @endforeach
            </div>
            @endif
        </div>
        <div class="mobile_slider">
            <!-- 小尺寸用-->
            <h3 class="product_tit">{{ $product->title }}</h3>
            <p class="subtitle">{{ $product->sub_title }}</p>
            @if(!empty($photo) && sizeof($photo) >0 )
            <ul class="bx_mobile">
                @foreach($photo as $data)
                <li><img src="/images/product/{{ $data->photo }}"></li>
                @endforeach
            </ul>
            @endif
            @if(!empty($spec) && sizeof($spec) > 0)
            <table class="prod_table">
                @foreach($spec as $data)
                <tr>
                    <th></th>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->content }}</td>
                </tr>
                @endforeach
            </table>
            @endif
            @if(!empty($shop) && sizeof($shop) > 0)
            <div class="shop_link">
            <h6>買好茶</h6>
                @foreach($shop as $data)
                <a href="{{ $data->url }}" target="blank">
                    <p>{{ $data->shopName }}</p>
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
<h2 class="main_title">關於好茶</h2>
<div class="product_int">
    <div class="int_img"><img src="product/product/img/product_int.jpg"></div>
    <div class="int_text">
        <p>xx身兼茶農與茶商，主打海外市場。產品含各式烏龍茶紅茶、綠茶、不同海拔茶區，在xx都可以找到你想要的好茶！ 與經驗老道的茶師傅合作、所選茶葉品質穩定。茶葉均通過TTB台茶檢驗，無農藥殘留。全世界最好的烏龍茶，大禹嶺茶自產自銷，絕對無假貨之疑慮。熟知市場行情，第一手茶葉進貨，進貨價格較低。</p>
    </div>
    <div class="int_video">
        <div class="video-container">
            <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/cdo7xnT5g1U"></iframe>
        </div>
    </div>
</div>

@endsection