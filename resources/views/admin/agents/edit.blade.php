<div class="demo-masked-input">
    {{ Form::open(['url'=>'agents/edit/'.$data->id,'files'=>'true','enctype'=>'mulitipart']) }}
    <div class="row clearfix">
        <div class="col-lg-12">
            <b>Name</b>
            <div class="input-group mb-3">
                {{ Form::text('name',$data->name,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <b>Username</b>
            <div class="input-group mb-3">
                {{ Form::text('username',$data->username,['class'=>'form-control','required']) }}
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <b>Password</b>
            <div class="input-group mb-3">
                {{ Form::password('password',['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-lg-10">
            <b>Image</b>
            <div class="input-group mb-3">
                {{ Form::file('image',['class'=>'form-control','accept'=>'image']) }}
            </div>
        </div>
        <div class="col-lg-2">
            <img src="{{ URL::to($data->image) }}" alt="" class="img-thumbnail img-responsive" srcset="">
        </div>
        
        <div class="col-lg-12 text-center">
            <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
        </div>
    </div>
    {{ Form::token() }}
    {{ Form::close() }}
</div>