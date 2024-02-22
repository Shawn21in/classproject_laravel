@extends("admin.layout")
@section("title", "類別管理")
@section("content")
<script>
    function doSearch(keyword) {
        $.ajax({
            url: "/admin/product/search",
            type: "post",
            data: {
                keyword: keyword,
                _token: "{{ csrf_token() }}"
            },
            success: function(msg) {
                $("#product").html(msg);
            }
        });
    }
</script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="/admin/product/add" class="btn btn-primary">新增</a>
                <a href="javascript:deleteAll('list')" class="btn btn-danger">刪除</a>
                <input type="text" id="keyword" class="" placeholder="關鍵字" onkeyup="doSearch(this.value)">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="/admin/product/delete" method="post" id="list" name="list">
            {{ csrf_field() }}
            <!-- laravel表單單要加上上面的token -->
            <table class="table table-bordered table-hover">
                <tr>
                    <th class="text-center"><input type="checkbox" id="all" class="form-check-input"></th>
                    <th class="text-center">分類</th>
                    <th class="text-center">大標題</th>
                    <th class="text-center">小標題</th>
                    <th class="text-center">內容說明</th>
                    <th class="text-center">首頁</th>
                    <th class="text-center">修改</th>

                </tr>
                <tbody id="product">
                    @foreach($list as $data)
                    <tr>
                        <td class="text-center"><input type="checkbox" class="form-check-input chk" name="id[]" value="{{ $data->id }}"></td>
                        <td class="text-center">{{ $data->type_layer1_name}}</td>
                        <td class="text-center">{{ $data->title}}</td>
                        <td class="text-center">{{ $data->sub_title}}</td>
                        <td class="text-center">{{ $data->content}}</td>
                        <td class="text-center">{{ $data->home}}</td>
                        <th class="text-center"><a href="/admin/product/edit/{{ $data->id }}" class="btn btn-success">修改</a></th>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <!-- 分頁 -->
            {{ $list->links() }}
        </form>
    </div>
</div>
@endsection