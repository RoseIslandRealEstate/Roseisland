<div class="demo-masked-input">
    <!-- <h3 class="text-center">{{ $data->name }}</h3> -->
    {{ Form::open(['url'=>'leads/update-status/'.$data->id,'files'=>'true','enctype'=>'mulitipart','class'=>'update_row','data-id'=>$data->id]) }}
            <div class="table_loader_holder">
                <div class="table_loader"></div>
            </div>
            <div class="row clearfix">
                <input type="hidden" name="old_status"   value="{{ $data->status }}">
                <input type="hidden" name="old_agent_id" value="{{ $data->agent_id }}">
                <div class="col-lg-12 col-md-12">
                    <b>status</b>
                    <div class="input-group mb-3">
                        {{ Form::select('status',$statuses,$data->status,['class'=>'form-control']) }}
                    </div>
                </div>
                @if(auth()->user())
                    <div class="col-lg-12 col-md-12">
                        <b>Asign to</b>
                        <div class="input-group mb-3">
                            {{ Form::select('agent_id',$agents,$data->agent_id,['class'=>'form-control select2']) }}
                        </div>
                    </div>
                @else
                <input type="hidden" name="agent_id" value="{{ $data->agent_id }}">
                @endif
                <div class="col-lg-12">
                    <b>Comment</b>
                    <div class="input-group mb-3">
                        {{ Form::textarea('text',null,['class'=>'form-control','rows'=>4,'placeholder'=>'please leave your comment if you have']) }}
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
                </div>
            </div>
    {{ Form::token() }}
    {{ Form::close() }}
</div>