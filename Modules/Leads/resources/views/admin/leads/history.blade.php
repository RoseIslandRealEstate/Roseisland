<div class="demo-masked-input">
    <ul class="comments_ul">
        @foreach($allData as $data)
        <li>
            <ul class="details_ul">
                <li><b> <i class="icon-user"></i>   </b> {{ $data->by }}  </li>
                <li><b> <i class="icon-calendar"></i> </b> {{ date('Y-m-d H:a ',strtotime($data->created_at)) }}</li>
                @if($data->old_agent_id != $data->agent_id)
                   <li><b> <i class="icon-energy"></i> </b> {{ $data->old_agent?'Was  : '.$data->old_agent->name.' --- ':' '  }} {{ $data->agent?'Asigned to  : '.$data->agent->name.'':' '  }} </li>
                @endif
                @if($data->old_status != $data->status)
                   <li><b> <i class=" icon-energy"></i> </b> Update Lead status from {{ isset($statuses[$data->old_status])?$statuses[$data->old_status]:'' }} to {{ isset($statuses[$data->status])?$statuses[$data->status]:'' }}</li>
                @endif
                @if($data->text)
                   <li>
                       <p>
                        {{ $data->text }}
                       </p>
                   </li>
                @endif
            </ul>
        </li>
        @endforeach
    </ul>
</div>