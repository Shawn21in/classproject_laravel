@extends("admin.layout")
@section("title", "新增圖檔")
@section("content")

<div class="mx-3">
    <form action="/admin/banner/insert" method="post" enctype="multipart/form-data">
    
    {{ csrf_field() }}
        <div class="row">
            <div class="col-2 text-right">ap</div>
            <div class="col-4">
                <select name="id" class="form-control" required>
                    <option value="">請選擇AP</option>
                    @foreach($list as $data)
                    <option value="{{$data->id}}">{{ $data->ap_name }}</option>
                    @endforeach
                </select>
                </div>
                </div>
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