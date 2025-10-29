<!doctype html>
<html lang="en">

<head>
<title>:: Rose Island :: Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/admin/') }}/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ URL::to('assets/admin/') }}/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/admin/') }}/css/main.css">

</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{ URL::to('assets/admin/') }}/images/white-logo.webp" alt="Iconic">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            {{ Form::open(['url'=>'login','class'=>'form-auth-small'])  }}
                                @if(session('no'))
                                <div class="danger alert-danger text-center ">
                                       <h5>{{  session('no') }}</h5> 
                                </div>
                                @endif
                                @if(session('yes'))
                                <div class="success alert-success text-center alert_success_msg">
                                        {{  session('yes') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email or Username</label>
                                    {{ Form::text('email',null,['class'=>'form-control','required','placeholder'=>'E-mail or username']) }}
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="signin-password"  placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            {{ Form::token() }}
                            {{ Form::close() }}
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
