<!-- Top navbar div start -->
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
                <a href="{{ URL::to('/') }}"> Rose Island Dashboard</a> 
            </div>
            
            <div class="navbar-right">
                <?php $notes = \App\Services\NotificationService::my_notes(); ?>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="notification-dot">{{ $notes->where('status',0)->count() }}</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li class="header"><strong>You have {{ $notes->where('status',0)->count() }}  Notifications</strong></li>
                               
                                @foreach($notes as $note) 
                                 <li>  
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-pie-chart text-info"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text note_view" data-url="{{ URL::to('notes/view/'.$note->id) }}">
                                                    {!! $note->text !!}
                                                </p>
                                                <span class="timestamp">{{ date('d M H:i a',strtotime($note->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                               
                            </ul>
                        </li>
                        <li>
                        <a href="{{ URL::to('logout') }}" class="icon-menu"><i class="fa fa-power-off"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
