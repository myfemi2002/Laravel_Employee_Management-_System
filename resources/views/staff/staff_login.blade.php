<!DOCTYPE html>
@php
$allData = App\Models\SystemSetting::orderBy('system_name','DESC')->first();
@endphp
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="{{ $allData->system_title }}">
        <meta name="keywords" content="{{ $allData->system_title }}">
        <meta name="author" content="{{ $allData->system_title }}">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - {{ $allData->system_title }} </title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ (!empty($allData->system_favion)) ? url('upload/system_settings_images/'.$allData->system_favion):url('upload/no_image.jpg') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/style.css') }}">
        <link href=" {{ asset('backend/admin/assets/toaster/toastr.css') }}" rel="stylesheet" />
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="account-page">
        <div class="main-wrapper">
            <div class="account-content">
                <a href="#" class="btn btn-primary apply-btn" target="blank">Webmail</a>
                <div class="container">
                    <div class="account-logo">
                        <a href="/"><img src="{{ (!empty($allData->system_logo)) ? url('upload/system_settings_images/'.$allData->system_logo):url('upload/no_image.jpg') }}" alt="Newinfo's Technologies"></a>
                    </div>
                    <div class="account-box">
                        <div class="account-wrapper">
                            <h3 class="account-title">Login</h3>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form  method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
                                    <small class="form-control-feedback">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>Password</label>
                                        </div>
                                    </div>
                                    <input type="password" name="password" class="form-control" id="inputChoosePassword"  placeholder="Enter Password">
                                    <small class="form-control-feedback">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit">Login</button>
                                </div>
                                <div class="account-footer">
                                    <p>Don't have an account yet? <a href="{{route('register')}}">Register</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('backend/admin/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/app.js') }}"></script>
        <!--validation JavaScript -->
        <script src="{{ asset('backend/staff/assets/validation/validate.min.js')}}"></script>
        <!--handlebars JavaScript -->
        <script src="{{ asset('backend/staff/assets/handlebars/handlebars.js')}}"></script>
        <!--notify cdnjs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('backend/staff/assets/sweetalert-code/code.js') }}"></script>
        <!-- Toaster js -->
        <script src="{{ asset('backend/staff/assets/toaster/toastr.min.js') }}"></script>
        <script>
            @if (Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch (type) {
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
            @endif
        </script>
    </body>
</html>
