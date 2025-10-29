        <td class="project-title">
            {{ $data->id }}
        </td>
        <td>
            <ul class="details_ul">
                <li><b>SNO :</b> {{ $data->sno }}  </li>
                <li><b>Date :</b> {{ $data->date }}  </li>
                <li><b>Platform :</b> {{ isset($platforms[$data->platform])?$platforms[$data->platform]:'' }}  </li>
                <li><b>Type :</b> {{ isset($types[$data->type])?$types[$data->type]:'' }}  </li>
                
            </ul>
        </td>
        <td>
            <ul class="details_ul">
                <li><b>Name :</b> {{ $data->name }}  </li>
                <li><b>Phone :</b> {{ $data->phone }}  </li>
                <li>{{ $data->inquiry }}  </li>
            </ul>
        </td>
        <td>
            <ul class="details_ul">
                @if($data->project_name)
                <li><b>project :</b> {{ $data->project_name }}  </li>
                @endif
                @if($data->portal)
                <li><b>Portal :</b> {{ $data->portal }}  </li>
                @endif
                <li><b>Asign :</b> {{ $data->agent_name }}  </li>
                @if($data->compaign)
                <li><b>Compaign :</b> {{ $data->compaign?$data->compaign->name:' ' }}  </li>
                @endif
            </ul>
        </td>
        <td>
            <a  class="badge badge-success edit_loader" data-toggle="modal" data-target="#exampleModalEdit"
            data-id="{{ $data->id }}"
            data-url="{{ URL::to('leads/statuses/'.$data->id) }}">{{ isset($statuses[$data->status])?$statuses[$data->status]:'' }}</a>
        </td>
        <td class="project-actions">
            <a data-toggle="modal" data-target="#exampleModalEdit" data-url="{{ URL::to('leads/update-status/'.$data->id) }}" class="btn btn-sm btn-outline-primary edit_loader"><i class="icon-wrench"></i></a>
            @if(auth()->user() || (auth()->guard('agent')->id() == $data->agent_id && 'agent_'.auth()->guard('agent')->id() == $data->user_id  ))
                <a data-toggle="modal" data-target="#exampleModalEdit" data-url="{{ URL::to('leads/edit/'.$data->id) }}" class="btn btn-sm btn-outline-success edit_loader"><i class="icon-pencil"></i></a>
                <a href="{{ URL::to('leads/delete/'.$data->id) }}" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
            @endif
        </td>
