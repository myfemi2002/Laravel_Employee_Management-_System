<!DOCTYPE html>
<html lang="en">
    @php
    $allData = App\Models\SystemSetting::orderBy('system_name','DESC')->first();
    @endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ $allData->system_description }}">
    <meta name="keywords" content="{{ $allData->system_keywords }}">
    <meta name="author" content="{{ $allData->system_author }}">
    <meta name="robots" content="noindex, nofollow">
    <title>Error 500 :: {{ $allData->system_title }} </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ (!empty($allData->system_favion)) ? url('upload/system_settings_images/'.$allData->system_favion):url('upload/no_image.jpg') }}">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="error-page">
        <div class="main-wrapper">
            <div class="error-box">
                <h1>500</h1>
                <h3><i class="fa fa-warning"></i> Oops! Something went wrong</h3>
                <p>Try to refresh this page or feel free to contact us if the problem persists.</p>
                <a href="{{ url()->previous() }}" class="btn btn-custom">Back to Home</a>
            </div>
        </div>
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>
