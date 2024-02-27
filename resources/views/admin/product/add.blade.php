@extends("admin.layout")
@section("title", "新增產品")
@section("content")
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>

<div class="mx-3">
    <form action="/admin/product/insert" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">基本資料</a></li>
                <li><a href="#tabs-2">產品圖</a></li>
                <li><a href="#tabs-3">規格</a></li>
                <li><a href="#tabs-4">商店</a></li>
            </ul>
            <div id="tabs-1">
                <div class="row">
                    <div class="col-1 text-right">類別</div>
                    <div class="col-3">
                        <select name="type_layer1_name" class="form-control">
                            <option value="請選擇類別" disabled selected>請選擇類別</option>
                            @foreach($type_layer1 as $data)
                            <option value="{{$data->id}}">{{ $data->type_layer1_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">大標題</div>
                    <div class="col-10"><input type="text" class="form-control" name="title"></div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">小標題</div>
                    <div class="col-10"><input type="text" class="form-control" name="sub_title"></div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">內容</div>
                    <div class="col-10"><input type="text" class="form-control" name="product_content"></div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">首頁</div>
                    
                    <div class="col-10">
                        <input type="checkbox" class="mx-1 form-check-input" name="home">
                    </div>
                </div>
            </div>
            <div id="tabs-2">
                @for($i=1;$i<=5;$i++) 
                <input type="file" class="form-control" name="file{{ $i }}">
                @endfor
            </div>
            <div id="tabs-3">
                @for($i=1;$i<=10;$i++)
                <div class="row"> 
                    <div class="col-3">
                        <input type="text" class="form-control" name="title{{ $i }}" placeholder="規格名稱">
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" name="content{{ $i }}" placeholder="規格內容">
                    </div>
                </div>
                @endfor
            </div>
            <div id="tabs-4">
                @foreach($shop as $data)
                    <input type="checkbox" name="shop{{ $data->id }}" value="{{ $data->id }}">
                    {{ $data->shopName }}
                    <div>網址: <input type="text" class="form-control" name="url{{ $data->id }}"></div>
                @endforeach
            </div>

        </div>
        <div class="col-12 text-center mt-3">
            <input type="submit" class="btn btn-primary bgn-lg" value="確定">
        </div>
    </form>
</div>
@endsection