<!-- main left menu -->
    <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
        <div class="sidebar-scroll">
            <div class="user-account">
                @if(auth()->user())
                    <img src="{{ URL::to('assets/admin') }}/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                @else
                    <img src="{{ URL::to(auth()->guard('agent')->user()->image) }}" class="rounded-circle user-photo" alt="User Profile Picture">
                @endif
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ auth()->user()?->name ?? auth()->guard('agent')->user()?->name ?? 'Guest' }} </strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="#"><i class="icon-user"></i>My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('logout') }}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
                <hr>
                <ul class="row list-unstyled">
                    <li class="col-4">
                        <small>Sales</small>
                        <h6>{{ $sales_leads_no }}</h6>
                    </li>
                    <li class="col-4">
                        <small>Rent</small>
                        <h6>{{ $rent_leads_no  }}</h6>
                    </li>
                    <li class="col-4">
                        <small>Leads</small>
                        <h6>{{ $leads_no }}</h6>
                    </li>
                </ul>
            </div>
            <!-- Nav tabs -->
           <nav id="left-sidebar-nav" class="sidebar-nav">
                        <ul id="main-menu" class="metismenu li_animation_delay">
                            <li class="active">
                                <a href="#Dashboard" class="has-arrow"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                                <ul>
                                    <li><a href="{{ URL::to('/') }}">Dashboard</a></li>
                                    <li><a href="{{ URL::to('leads') }}">Leads</a></li>
                                    @if(auth()->user())
                                        <li><a href="{{ URL::to('agents') }}">Agents</a></li>
                                        <li><a href="{{ URL::to('projects') }}">Projects</a></li>
                                        <li><a href="{{ URL::to('compaigns') }}">Compaigns</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </nav>
                
           
        </div>
    </div>

    <!-- rightbar icon div -->
    <div class="right_icon_bar" style="">
        <ul>
            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a href="#"><i class="fa fa-comments"></i></a></li>
            <li><a href="#"><i class="fa fa-calendar"></i></a></li>
            <li><a href="#"><i class="fa fa-folder"></i></a></li>
            <li><a href="#"><i class="fa fa-id-card"></i></a></li>
            <li><a href="#"><i class="fa fa-globe"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa fa-plus"></i></a></li>
            <li><a href="javascript:void(0);" class="right_icon_btn"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>