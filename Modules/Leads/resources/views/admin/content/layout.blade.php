@include('admin.content.header')
@include('admin.content.nav')
@include('admin.content.sidebar')
<div id="main-content">
    <div class="container-fluid">
        @if(session('yes'))
        <div class="success alert-success text-center alert_success_msg">
                {{  session('yes') }}
        </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>
@include('admin.content.footer')