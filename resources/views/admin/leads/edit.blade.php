<div class="demo-masked-input ">
    <!-- <h3 class="text-center">{{ $data->name }}</h3> -->
    {{ Form::open(['url'=>'leads/edit/'.$data->id,'files'=>'true','enctype'=>'mulitipart','class'=>'update_row','data-id'=>$data->id]) }}
            <div class="table_loader_holder">
                <div class="table_loader"></div>
            </div>
            
            <div class="row clearfix">
                <!-- <div class="col-lg-4">
                    <b>SNO</b>
                    <div class="input-group mb-3">
                        {{ Form::text('sno',$data->sno,['class'=>'form-control']) }}
                    </div>
                </div> -->
                <div class="col-lg-6">
                    <b>Date</b>
                    <div class="input-group mb-3">
                        {{ Form::date('date',$data->date,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-lg-6">
                    <b>Phone</b>
                    <div class="input-group mb-3">
                        {{ Form::text('phone',$data->phone,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-lg-12">
                    <b>Name</b>
                    <div class="input-group mb-3">
                        {{ Form::text('name',$data->name,['class'=>'form-control','required']) }}
                    </div>
                </div>
                @if(auth()->user())
                    <div class="col-lg-6 col-md-6">
                        <b>Compaign</b>
                        <div class="input-group mb-3">
                            {{ Form::select('compaign_id',$compaigns,$data->compaign_id,['class'=>'form-control','placeholder'=>'Please Choose Compaign']) }}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <b>Asign to</b>
                        <div class="input-group mb-3">
                            {{ Form::select('agent_id',$agents,$data->agent_id,['class'=>'form-control select2','placeholder'=>'Please Choose Agent']) }}
                        </div>
                    </div>
                @else
                    <input type="hidden" name="agent_id" value="{{ auth()->guard('agent')->id() }}">
                    <input type="hidden" name="compaign_id" value="{{ $data->compaign_id }}">
                @endif
                <div class="col-lg-6 col-md-6">
                    <b>Type</b>
                    <div class="input-group mb-3">
                        {{ Form::select('type',$types,$data->type,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <b>Project</b>
                    <div class="input-group mb-3">
                        {{ Form::select('project_id',$projects,$data->project_id,['class'=>'form-control','placeholder'=>'Please Choose Project']) }}
                    </div>
                </div>
                @if(auth()->user())
                    <div class="col-lg-4 col-md-6">
                        <b>Portal</b>
                        <div class="input-group mb-3">
                            {{ Form::select('portal',$portals,$data->portal,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <b>Platform</b>
                        <div class="input-group mb-3">
                            {{ Form::select('platform',$platforms,$data->platform,['class'=>'form-control','placeholder'=>'Please choose the Platform']) }}
                        </div>
                    </div>
                @else
                    <input type="hidden" name="portal" value="{{ $data->portal }}">
                    <input type="hidden" name="platform" value="{{ $data->platform }}">
                @endif
                <div class="col-lg-12">
                    <b>Inquiry</b>
                    <div class="input-group mb-3">
                        {{ Form::textarea('inquiry',$data->inquiry,['class'=>'form-control','rows'=>4]) }}
                    </div>
                </div>
                @if(auth()->user())
                    <div class="col-lg-6 danger">
                        <b>Agent name</b>
                        <div class="input-group mb-3">
                            {{ Form::text('agent_name',$data->agent_name,['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="col-lg-6 danger">
                        <b>Project name</b>
                        <div class="input-group mb-3">
                            {{ Form::text('project_name',$data->project_name,['class'=>'form-control']) }}
                        </div>
                    </div>
                @endif
                <div class="col-lg-12 text-center">
                    <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
                </div>
            </div>
    {{ Form::token() }}
    {{ Form::close() }}
</div>
<script src="{{ URL::to('assets/admin') }}/select2/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
                width: '100%'
        });
    });
</script> roseisland2020