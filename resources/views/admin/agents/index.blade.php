@extends('admin.content.layout')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2>
                    {{ $title }}
                </h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i></a></li>                            
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix row-deck">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="body text-center">
                    <div class="p-t-65 p-b-65">
                        <h6>Add New </h6>                                
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @foreach($allData as $data)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card">
                    <div class="body text-center">
                        <div class="chart easy-pie-chart-1" data-percent="75"> <span><img src="{{ URL::to($data->image) }}" alt="user" class="rounded-circle"/></span> </div>
                        <h6>{{ $data->name }}</h6>
                        <ul class="agents-links list-unstyled">

                            <li>
                                <a data-toggle="modal" data-target="#exampleModalEdit" class="btn btn-sm btn-outline-success edit_loader" data-url="{{ URL::to('agents/edit/'.$data->id) }}"><i class="icon-pencil"></i></a>
                            </li>
                            <li>
                                <a href="{{ URL::to('agents/delete/'.$data->id) }}" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row clearfix">
        <!-- modual -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Agent</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="demo-masked-input">
                                    {{ Form::open(['url'=>'agents/add','files'=>'true','enctype'=>'mulitipart']) }}
                                    <div class="row clearfix">
                                        <div class="col-lg-6">
                                            <b>Name</b>
                                            <div class="input-group mb-3">
                                                {{ Form::text('name',null,['class'=>'form-control','required']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <b>Image</b>
                                            <div class="input-group mb-3">
                                                {{ Form::file('image',['class'=>'form-control']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <b>Username</b>
                                            <div class="input-group mb-3">
                                                {{ Form::text('username',null,['class'=>'form-control','required']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <b>Password</b>
                                            <div class="input-group mb-3">
                                                {{ Form::password('password',['class'=>'form-control','required']) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-lg btn-primary submit-btn" type="submit">Save</button>
                                        </div>
                                    </div>
                                    {{ Form::token() }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalEdit">Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="demo-masked-input edit_modal" >
                                   <div class="loader_holder active">
                                       <div class="loader"></div>
                                   </div>
                                   <div id="edit_modal">

                                   </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <!-- endmodual -->
    </div>
@stop