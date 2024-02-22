@extends("admin.layout")
@section("title", "商店管理")
@section("content")


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <a href="/admin/shop/add" class="btn btn-primary">新增</a>
            <a href="javascript:deleteAll('list')" class="btn btn-danger">刪除</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-12">
    <form action="/admin/shop/delete" method="post" id="list" name="list">
        {{ csrf_field() }}
        <!-- laravel表單單要加上上面的token -->
        <table class="table table-bordered table-hover">
            <tr>
                <th class="text-center"><input type="checkbox" id="all" class="form-check-input"></th>
                <th class="text-center">商店名稱</th>
                <th class="text-center">修改</th>

            </tr>
            @foreach($list as $data)
            <tr>
                <td class="text-center"><input type="checkbox" class="form-check-input chk" name="id[]" value="{{ $data->id }}"></td>
                <td class="text-center">{{ $data->shopName}}</td>
                <th class="text-center"><a href="/admin/shop/edit/{{ $data->id }}" class="btn btn-success">修改</a></th>
            </tr>

            @endforeach
        </table>
    </form>
</div>
</div>
@endsection