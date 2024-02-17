@extends("admin.layout")
@section("title", "類別管理")
@section("content")


<div class="row mx-3">
    <div><a href="/admin/type1/add" class="btn btn-primary">新增</a></div>
</div>
<div class="row mx-3">
    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center"><input type="checkbox" id="all" class="form-check-input"></th>
            <th class="text-center">類別名稱</th>
            <th class="text-center">修改</th>
            
        </tr>
        @foreach($list as $data)
        <tr>
            <td class="text-center"><input type="checkbox" name="id[]" value="{{ $data->id }}"></td>
            <td class="text-center">{{ $data->type_layer1_name}}</td>
            <th class="text-center"><a href="/admin/type1/edit/{{ $data->id }}" class="btn btn-success">修改</a></th>
        </tr>
        
        @endforeach
    </table>
</div>
@endsection