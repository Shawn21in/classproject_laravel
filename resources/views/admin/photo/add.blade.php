@extends("admin.layout")
@section("title", "新增圖檔")
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
    <form action="/admin/photo/insert" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" value="{{ $product_id }}">    
    {{ csrf_field() }}
        <div class="row">
            <div class="col-2 text-right">圖檔</div>
            <div class="col-4"><input type="file" name="photo" class="form-control" required></div>

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