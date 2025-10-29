{{ Form::open(['url'=>'leads/add','files'=>'true','enctype'=>'mulitipart','class'=>'add_row']) }}
    <div class="table_loader_holder">
        <div class="table_loader"></div>
    </div>
    <div class="row clearfix">
        <!-- <div class="col-lg-4">
            <b>SNO</b>
            <div class="input-group mb-3">
                {{ Form::text('sno',null,['class'=>'form-control']) }}
            </div>
        </div> -->
        <div class="col-lg-6">
            <b>Date</b>
            <div class="input-group mb-3">
                {{ Form::date('date',date('Y-m-d'),['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-lg-6">
            <b>Phone</b>
            <div class="input-group mb-3">
                {{ Form::text('phone',null,['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-lg-6">
            <b>Name</b>
            <div class="input-group mb-3">
                {{ Form::text('name',null,['class'=>'form-control','required']) }}
            </div>
        </div>
        
        @if(!isset(auth()->user()->id))
            <input type="hidden" name="agent_id" value="{{ auth()->guard('agent')->id() }}">
        @else
            <div class="col-lg-6 col-md-6">
                <b>Compaign</b>
                <div class="input-group mb-3">
                    {{ Form::select('compaign_id',$compaigns,null,['class'=>'form-control','placeholder'=>'Please Choose Compaign']) }}
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <b>Asign to</b>
                <div class="input-group mb-3">
                    {{ Form::select('agent_id',$agents,null,['class'=>'form-control  select2','placeholder'=>'Please Choose Agent']) }}
                </div>
            </div> 
        @endif
        <div class="col-lg-6 col-md-6">
            <b>Type</b>
            <div class="input-group mb-3">
                {{ Form::select('type',$types,null,['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-lg-4 col-md-3">
            <b>Project</b>
            <div class="input-group mb-3">
                {{ Form::select('project_id',$projects,null,['class'=>'form-control','placeholder'=>'Please Choose Project']) }}
            </div>
        </div>
        <div class="col-lg-4 col-md-3">
            <b>Platform</b>
            <div class="input-group mb-3">
                {{ Form::select('platform',$platforms,null,['class'=>'form-control','placeholder'=>'Please choose the Platform']) }}
            </div>
        </div>
        <div class="col-lg-4 col-md-3">
            <b>Portal</b>
            <div class="input-group mb-3">
                {{ Form::select('portal',$portals,null,['class'=>'form-control','placeholder'=>'Please choose the portal']) }}
            </div>
        </div>
        <div class="col-lg-12">
            <b>Inquiry</b>
            <div class="input-group mb-3">
                {{ Form::textarea('inquiry',null,['class'=>'form-control','rows'=>4]) }}
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
        </div>
    </div>
{{ Form::token() }}
{{ Form::close() }}