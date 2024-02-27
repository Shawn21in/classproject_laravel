@extends("admin.layout")
@section("title", "修改產品")
@section("content")
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        $("#tabs").tabs();
    });

    @if(Session::has("message"))
    Swal.fire("{{ Session::get('message') }}");
    @endif

    function doDelete(formId) {
        Swal.fire({
            title: "確定刪除?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "確定",
            denyButtonText: `放棄`
        }).then((result) => {
            if (result.isConfirmed) {
                //document.list.submit();第一種方法上面不用帶參數
                document.forms[formId].submit();
            }
        });
    }
</script>

<div class="mx-3">

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">基本資料</a></li>
            <li><a href="#tabs-2">產品圖</a></li>
            <li><a href="#tabs-3">規格</a></li>
            <li><a href="#tabs-4">商店</a></li>
        </ul>
        <div id="tabs-1">
            <form action="/admin/product/update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $product->id }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-1 text-right">類別</div>
                    <div class="col-3">
                        <select name="type_layer1" class="form-control">
                            <option disabled selected>請選擇類別</option>
                            @foreach($type_layer1 as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $product->type_layer1 ? "selected" : "" }}>{{ $data->type_layer1_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">大標題</div>
                    <div class="col-10"><input type="text" class="form-control" name="title" value="{{ $product->title }}"></div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">小標題</div>
                    <div class="col-10"><input type="text" class="form-control" name="sub_title" value="{{ $product->sub_title }}"></div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">內容</div>
                    <div class="col-10"><input type="text" class="form-control" name="product_content" value="{{ $product->content }}"></div>
                </div>
                <div class="row">
                    <div class="col-1 text-right">首頁</div>

                    <div class="col-10">
                        <input type="checkbox" class="mx-1 form-check-input" name="home" value="Y" {{ $product->home == "Y" ? "checked" : ""}}>
                    </div>
                </div>
                <div class="col-12 text-center mt-3">
                    <input type="submit" class="btn btn-primary bgn-lg" value="確定">
                </div>
            </form>
        </div>
        <div id="tabs-2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/admin/photo/add/{{ $product->id }}" class="btn btn-success text-white">新增</a>
                            <a href="javascript:deleteAll('photo')" class="btn btn-danger">刪除</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="/admin/photo/delete" method="post" id="photo" name="photo">
                        {{ csrf_field() }}
                        <!-- laravel表單單要加上上面的token -->
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="text-center"><input type="checkbox" id="photoall" class="form-check-input"></th>
                                <th class="text-center">圖檔</th>

                            </tr>
                            <tbody id="photo">
                                @foreach($photo as $data)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="form-check-input photochk" name="photo_id[]" value="{{ $data->id }}"></td>
                                    <td class="text-center"><img src="/images/product/{{ $data->photo}}" width="100"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div id="tabs-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/admin/spec/add/{{ $product->id }}" class="btn btn-success text-white">新增</a>
                            <a href="javascript:deleteAll('productShop')" class="btn btn-danger">刪除</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="/admin/spec/delete" method="post" id="spec" name="spec">
                    <input type="hidden" name="id" value="{{ $product->id }}">    
                    {{ csrf_field() }}
                        <!-- laravel表單單要加上上面的token -->
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="text-center"><input type="checkbox" id="specall" class="form-check-input"></th>
                                <th class="text-center">規格名稱</th>
                                <th class="text-center">規格內容</th>
                                <th class="text-center">修改</th>

                            </tr>
                            <tbody id="spec">
                                @foreach($spec as $data)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="form-check-input specchk" name="spec_id[]" value="{{ $data->id }}"></td>
                                    <td class="text-center">{{ $data->title }}</td>
                                    <td class="text-center">{{ $data->content }}</td>
                                    <td class="text-center"><a href="/admin/spec/edit/{{ $product->id }}/{{ $data->id }}" class="btn btn-primary text-white">修改</a></td>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div id="tabs-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if ( sizeof($shopList) > sizeof($shop) )
                            <a href="/admin/productShop/add/{{ $product->id }}" class="btn btn-success text-white">新增</a>
                            @endif
                            <a href="javascript:deleteAll('shop')" class="btn btn-danger">刪除</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="/admin/productShop/delete" method="post" id="shop" name="shop">
                        {{ csrf_field() }}
                        <!-- laravel表單單要加上上面的token -->
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th class="text-center"><input type="checkbox" id="shopall" class="form-check-input"></th>
                                <th class="text-center">商店名稱</th>
                                <th class="text-center">網址</th>
                                <th class="text-center">修改</th>

                            </tr>
                            <tbody id="productshop">
                                @foreach($shop as $data)
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="form-check-input shopchk" name="shop_id[]" value="{{ $data->id }}"></td>
                                    <td class="text-center">{{ $data->shopName }}</td>
                                    <td class="text-center">{{ $data->url }}</td>
                                    <td class="text-center"><a href="/admin/productShop/edit/{{ $product->id }}/{{ $data->id }}" class="btn btn-primary text-white">修改</a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

</div>
@endsection