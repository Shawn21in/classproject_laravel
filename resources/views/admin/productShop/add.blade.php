@extends("admin.layout")
@section("title", "新增產品商店")
@section("content")
<!-- <script>
    function doCheck(shopName) {
        $.ajax({
            url: "/admin/shop/check",
            type: "post",
            data: {
                shopName: shopName,
                _token: "{{ csrf_token() }}"
            },
            success: function(msg) {
                if (msg == "exist") {
                    Swal.fire(shopName + "已存在");
                    
                }
            }
        });
    }
</script> -->
<div class="mx-3">
    <form action="/admin/productShop/insert" method="post">
    <input type="hidden" name="product_id" value="{{ $product_id }}">    
    {{ csrf_field() }}
        <div class="row">
            <div class="col-2 test-right">商店</div>
            <div class="col-4">
                <select name="shop_id" class="form-control">
                    <option value="">請選擇商店</option>
                    @foreach($list as $data)
                    <option value="{{ $data->id }}">{{ $data->shopName }}</option>
                    @endforeach
                </select>
            </div>    
    </div>
    <div class="row">
    <div class="col-2 text-right">網址</div>
    <div class="col-10"><input type="text" class="form-control" name="url"></div>
    </div>
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-2">
                <input type="submit" class="btn btn-primary" value="確定">
            </div>
            <div class="col-2 text-right">
                <button type="button" class="btn btn-warning" onclick="javascript:history.back()">放棄</button>
                <!-- history.back()指的是瀏覽器的上一頁 -->
            </div>
        </div>
    </form>
</div>
@endsection