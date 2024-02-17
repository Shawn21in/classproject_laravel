@extends("admin.layout")
@section("title", "修改類別")
@section("content")
<div class="mx-3">
    <form action="/admin/type1/update" method="post">
        <input type="hidden" name="id" value="{{ $type_layer1->id }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-2 text-right">類別名稱</div>
            <div class="col-4"><input type="text" name="type_layer1_name" class="form-control" value="{{ $type_layer1-> type_layer1_name }}" required></div>

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