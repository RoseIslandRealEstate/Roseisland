@section('styles')
<link href="{{ URL::to('assets/admin/') }}/select2/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@extends('admin.content.layout')
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>{{ $title }}</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i></a></li>                            
                    <li class="breadcrumb-item">{{ $title }}</li>
                    <li class="breadcrumb-item active">
                        {{ $title }}
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="d-flex flex-row-reverse">
                    <div class="page_action">
                        @if(auth()->user())
                        <button type="button" class="btn btn-primary"><i class="fa fa-upload"></i> Import</button>
                        @endif
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-square"></i> Add new lead</button>
                    </div>
                    <div class="p-2 d-flex">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="body project_report">
                    <div class="body">
                        {{ Form::open(['url'=>'leads','class'=>'filter_form','method'=>'GET']) }}
                             <div class="row clearfix">
                                <div class="col-lg-3">
                                    <div class="input-group mb-3">
                                        {{ Form::text('name',request()->name,['class'=>'form-control','placeholder'=>'client name or phone']) }}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group mb-3">
                                        {{ Form::text('lead',request()->lead,['class'=>'form-control','placeholder'=>'project name , agent name or compaign name ']) }}
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 col-md-3">
                                    <div class="input-group mb-3">
                                        {{ Form::select('status',$statuses,request()->status,['class'=>'form-control','placeholder'=>'Please Choose lead status']) }}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <div class="input-group mb-3">
                                        {{ Form::select('platform',$platforms,request()->platform,['class'=>'form-control','placeholder'=>'Please choose the Platform']) }}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <div class="input-group mb-3">
                                        {{ Form::select('portal',$portals,request()->portal,['class'=>'form-control','placeholder'=>'Please choose the partal']) }}
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
                                <div class="col-lg-1">
                                    <div class="input-group mb-3" style="padding-top:30px">
                                          <b>Export XSL <input type="checkbox" name="export" value="1" ></b>
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
                               @include('admin.leads.table')
                            </div>
                            
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
                                <h5 class="modal-title" id="exampleModalLabel">New lead</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="demo-masked-input">
                                    @include('admin.leads.add')
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