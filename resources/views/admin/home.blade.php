
@extends('admin.content.layout')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>Project Board</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Project Board</li>
            </ul>
        </div>
       
    </div>
</div>
<div class="row clearfix row-deck">
    <div class="col-lg-6 col-md-12">
        <div class="row clearfix row-deck">
            <div class="col-lg-6 col-md-12">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Income Analysis</span>
                        <h4 class="mb-0 mt-2">$22,500 <i class="fa fa-level-up font-12"></i></h4>
                        <small class="text-muted">8% High then last month</small>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%" data-height="50px"
                    data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">4,1,5,2,7,3,4</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Sales Income</span>
                        <h4 class="mb-0 mt-2">$9,500 <i class="fa fa-level-up font-12"></i></h4>
                        <small class="text-muted">12% High then last month</small>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%" data-height="50px"
                    data-line-Width="1" data-line-Color="#ffa901" data-fill-Color="#efc26b">1,4,2,3,6,2</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Work report</h2>
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
                    <div class="body">
                        <ul class="list-unstyled">
                            <li>
                                <h6 class="d-flex justify-content-between align-items-center">
                                    <span>54</span>
                                    <span class="text-muted font-14">Today Works</span>
                                </h6>
                                <div class="progress progress-xs progress-transparent custom-color-blue">
                                    <div class="progress-bar" data-transitiongoal="87"></div>
                                </div>
                            </li>
                            <li>
                                <h6 class="d-flex justify-content-between align-items-center">
                                    <span>27</span>
                                    <span class="text-muted font-14">Open Tasks</span>
                                </h6>
                                <div class="progress progress-xs progress-transparent custom-color-purple">
                                    <div class="progress-bar" data-transitiongoal="34"></div>
                                </div>
                            </li>                                
                            <li>
                                <h6 class="d-flex justify-content-between align-items-center">
                                    <span>102</span>
                                    <span class="text-muted font-14">Closed Tasks</span>
                                </h6>
                                <div class="progress progress-xs progress-transparent custom-color-yellow">
                                    <div class="progress-bar" data-transitiongoal="54"></div>
                                </div>
                            </li>
                            <li>
                                <h6 class="d-flex justify-content-between align-items-center">
                                    <span>1024 h</span>
                                    <span class="text-muted font-14">Total spent time</span>
                                </h6>
                                <div class="progress progress-xs progress-transparent custom-color-green mb-0">
                                    <div class="progress-bar" data-transitiongoal="67"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Report by Sector</h2>
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
                    <div class="body">
                        <div id="Report-by-Sector" style="height: 200px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>ToDo List </h2>
            </div>
            <div class="body todo_list">
                {{ Form::open(['url' => 'to-do-lists/add', 'class' => 'add_form', 'data-class' => '.add_to_list']) }}
                    <div class="input-group mb-3">
                        <input type="text" name="text" required class="form-control" placeholder="Enter here...">
                        <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Add ToDo</button>
                        </div>
                    </div>
                {{ Form::token() }}
                {{ Form::close() }}

                <div class="dd nestable-with-handle m-b-15">
                    <ol class="dd-list add_to_list" >
                        @foreach($my_list as $item)
                          @include('admin.to_lists.li')
                        @endforeach
                    </ol>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row clearfix row-deck">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="header">
                <h2>Workload by team</h2>
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
            <div class="body">
                <div id="Workload-by-team" style="height: 280px"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h2>Design</h2>
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
            <div class="body text-center">
                <div class="mb-4">
                    <input type="text" class="knob" value="73" data-width="120" data-height="120" data-thickness="0.1" data-fgColor="#17a2b8" readonly>
                </div>
                <div>
                    <h5 class="text-info">$ 29,012</h5>
                    <p class="mb-0">Average <span class="font-12 text-muted"><i class="fa fa-level-up"></i> 23%</span></p>
                    <hr>
                    <div class="Team_lead">
                        <div>Team Lead</div>
                        <h6 class="mb-0">@Barbara Kelly</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="header">
                <h2>Development</h2>
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
            <div class="body text-center">
                <div class="mb-4">
                    <input type="text" class="knob" value="46" data-width="120" data-height="120" data-thickness="0.1" data-fgColor="#ffc107" readonly>
                </div>
                <div>
                    <h5 class="text-warning">$ 1,29,201</h5>
                    <p class="mb-0">Average <span class="font-12 text-muted"><i class="fa fa-level-up"></i> 14%</span></p>
                    <hr>
                    <div class="Team_lead">
                        <div>Team Lead</div>
                        <h6 class="mb-0">@Orlando Lentz</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      
@stop