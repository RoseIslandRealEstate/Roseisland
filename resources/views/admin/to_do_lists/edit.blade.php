<div class="demo-masked-input ">
    {{ Form::open(['url'=>'to-do-lists/edit/'.$data->id,'files'=>'true','enctype'=>'mulitipart','class'=>'update_row','data-id'=>$data->id]) }}
            <div class="table_loader_holder">
                <div class="table_loader"></div>
            </div>
             <div class="row clearfix">
                <div class="col-lg-6 col-md-6">
                    <b>Asign to</b>
                    {{ Form::select('agent_id',$agents,$data->agent_id,['class'=>'form-control  select2','placeholder'=>'Please Choose Agent']) }}
                </div>
                <div class="col-lg-6 col-md-6">
                    <b>Date</b>
                    <div class="input-group mb-3">
                        {{ Form::date('date',$data->date,['class'=>'form-control','required']) }}
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="input-group mb-3">
                        {{ Form::textarea('text',$data->text,['class'=>'form-control','required']) }}
                    </div>
                </div>
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
</script> 