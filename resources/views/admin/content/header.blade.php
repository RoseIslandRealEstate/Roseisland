    <!doctype html>
<html lang="en">

<head>
<title>:: Rose Island RealEstate :: Project</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/vendor/nestable/jquery-nestable.css"/>
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/vendor/charts-c3/plugin.css"/>
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<!-- MAIN CSS -->
 @yield('styles')
<link rel="stylesheet" href="{{ URL::to('assets/admin') }}/css/main.css">
</head>

<body data-theme="light" class="font-nunito">

<div id="wrapper" class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img src="{{ URL::to('assets/admin') }}/images/logo-icon.svg" width="48" height="48" alt="Rose island">
            </div>
            <p>Please wait...</p>
        </div>
    </div>