@foreach($list as $data)
<tr>
    <td class="text-center"><input type="checkbox" class="form-check-input chk" name="id[]" value="{{ $data->id }}"></td>
    <td class="text-center">{{ $data->type_layer1_name}}</td>
    <th class="text-center"><a href="/admin/type1/edit/{{ $data->id }}" class="btn btn-success">修改</a></th>
</tr>

@endforeach