<div class="demo-masked-input">
    <!-- <h3 class="text-center">{{ $data->name }}</h3> -->
    {{ Form::open(['url'=>'compaigns/edit/'.$data->id,'files'=>'true','enctype'=>'mulitipart']) }}
   <div class="row clearfix">
        <div class="col-lg-6">
            <b>Name</b>
            <div class="input-group mb-3">
                {{ Form::text('name',$data->name,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <b>Platform</b>
            <div class="input-group mb-3">
                {{ Form::select('platform',$platforms,$data->platform,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <b>Project</b>
            <div class="input-group mb-3">
                {{ Form::select('project_id',$projects,$data->project_id,['class'=>'form-control','placeholder'=>'Please choose the project']) }}
            </div>
        </div>
        <div class="col-lg-6">
            <b>Budget</b>
            <div class="input-group mb-3">
                {{ Form::number('budget',$data->budget,['class'=>'form-control','step'=>'any','min'=>0]) }}
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <b>Start Date</b>
            <div class="input-group mb-3">
                {{ Form::date('start_date',$data->start_date,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <b>End Date</b>
            <div class="input-group mb-3">
                {{ Form::date('end_date',$data->end_date,['class'=>'form-control','required']) }}
            </div>
        </div>
        
        <div class="col-lg-12 text-center">
            <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
        </div>
    </div>
    {{ Form::token() }}
    {{ Form::close() }}
</div>