@section('styles')
    <link href="{{ URL::to('assets/admin/') }}/select2/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
                            Add new Task
                        </button>
                        </br>
                        </br>
                    {{ Form::open(['url'=>'to-do-lists','class'=>'filter_form','method'=>'GET']) }}
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3">
                                    <b>Agent</b>
                                    <div class="input-group mb-3">
                                       {{ Form::select('agent_id',$agents,null,['class'=>'form-control  select2','placeholder'=>'Please Choose Agent']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <b>Date from</b>
                                    <div class="input-group mb-3">
                                        {{ Form::date('date_from',request()->date_from,['class'=>'form-control']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <b>Date to</b>
                                    <div class="input-group mb-3">
                                        {{ Form::date('date_to',request()->date_to,['class'=>'form-control']) }}
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 text-center"  style="padding-top:20px">
                                    <button class="btn btn-lg btn-primary submit-btn" type="submit">Search</button>
                                </div>
                            </div>
                    {{ Form::close() }}
                    <div class="table-responsive filter_table filter_holder ">
                            <div class="table_loader_holder">
                                <div class="table_loader"></div>
                            </div>
                            <div class="table_div">
                                @include('admin.to_do_lists.table')
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- modual -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="demo-masked-input">
                                    @include('admin.to_do_lists.add')
                                    
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                <!-- <h5 class="modal-title text-center" id="exampleModalEdit">Update</h5> -->
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
    @section('scripts')
        <script src="{{ URL::to('assets/admin') }}/select2/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                        width: '100%'
                });
            });
        </script>
    @endsection
@stop