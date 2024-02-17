@extends("admin.layout")
@section("title", "新增類別")
@section("content")
<div class="mx-3">
    <form action="/admin/type1/insert" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-2 text-right">類別名稱</div>
            <div class="col-4"><input type="text" name="type_layer1_name" class="form-control" required></div>

        </div>
        <div class="row mt-3">
            <div class="col-2"></div>
            <div class="col-2">
                <input type="submit" class="btn btn-primary" value="確定">
            </div>
        </div>
    </form>
</div>
@endsection