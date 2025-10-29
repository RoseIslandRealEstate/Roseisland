@extends('admin.content.layout')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>{{ $title }}</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body project_report">
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                            Add New 
                        </button>
                        </br>
                        </br>
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom mb-0">
                            <thead>
                                <tr>                                            
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allData as $data)
                                <tr>
                                    <td class="project-title">
                                        {{ $data->id }}
                                    </td>
                                    <td >
                                        {{ $data->name}}
                                    </td>
                                    <td><img src="{{ URL::to($data->image??'assets/admin/images/xs/avatar1.jpg') }}" data-toggle="tooltip" data-placement="top" title="Team Lead" alt="Avatar" class="width35 rounded"></td>
                                    <td class="project-actions">
                                        <a data-toggle="modal" data-target="#exampleModalEdit" class="btn btn-sm btn-outline-success edit_loader" data-url="{{ URL::to('projects/edit/'.$data->id) }}"><i class="icon-pencil"></i></a>
                                        <a href="{{ URL::to('projects/delete/'.$data->id) }}" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- modual -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="demo-masked-input">
                                    {{ Form::open(['url'=>'projects/add','files'=>'true','enctype'=>'mulitipart']) }}
                                    <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <b>Name</b>
                                            <div class="input-group mb-3">
                                                {{ Form::text('name',null,['class'=>'form-control','required']) }}
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