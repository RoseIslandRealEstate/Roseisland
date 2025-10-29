{{ Form::open(['url'=>'to-do-lists/add-row','files'=>'true','enctype'=>'mulitipart','class'=>'add_row']) }}
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6">
            <b>Asign to</b>
            {{ Form::select('agent_id',$agents,null,['class'=>'form-control  select2','placeholder'=>'Please Choose Agent']) }}
        </div>
        <div class="col-lg-6 col-md-6">
            <b>Date</b>
            <div class="input-group mb-3">
                {{ Form::date('date',null,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="input-group mb-3">
                {{ Form::textarea('text',null,['class'=>'form-control','required']) }}
            </div>
        </div>
        
        <div class="col-lg-12 text-center">
            <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
        </div>
    </div>
{{ Form::token() }}
{{ Form::close() }}