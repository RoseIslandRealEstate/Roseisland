<div class="demo-masked-input">
    {{ Form::open(['url'=>'projects/edit/'.$data->id,'files'=>'true','enctype'=>'mulitipart']) }}
    <div class="row clearfix">
        <div class="col-lg-12">
            <b>Name</b>
            <div class="input-group mb-3">
                {{ Form::text('name',$data->name,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
        </div>
    </div>
    {{ Form::token() }}
    {{ Form::close() }}
</div>