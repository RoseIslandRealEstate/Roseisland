 <td class="project-title">
    {{ $data->id }}
</td>
<td >
    {{ $data->text}}
</td>
<td>
    {{ $data->agent?->name }}
</td>
<td>
    {{ $data->date }}
</td>

<td class="project-actions">
    <a data-toggle="modal" data-target="#exampleModalEdit" class="btn btn-sm btn-outline-success edit_loader" data-url="{{ URL::to('to-do-lists/edit/'.$data->id) }}"><i class="icon-pencil"></i></a>
    <a href="{{ URL::to('to-do-lists/delete/'.$data->id) }}" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
</td>