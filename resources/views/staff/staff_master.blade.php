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
    <title>@yield('title'):: {{ $allData->system_title }} </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ (!empty($allData->system_favion)) ? url('upload/system_settings_images/'.$allData->system_favion):url('upload/no_image.jpg') }}">

        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/line-awesome.min.css') }}">

        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/dataTables.bootstrap4.min.css') }}">


        <link href=" {{ asset('backend/staff/assets/toaster/toastr.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/style.css') }}">
        <script src="{{ asset('backend/staff/assets/js/jquery-3.6.0.min.js') }}"></script>
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
            <div id="loader-wrapper">
                <div id="loader">
                    <div class="loader-ellips">
                        <span class="loader-ellips__dot"></span>
                        <span class="loader-ellips__dot"></span>
                        <span class="loader-ellips__dot"></span>
                        <span class="loader-ellips__dot"></span>
                    </div>
                </div>
            </div>
            {{-- header --}}

            @include('staff.body.header')

            {{-- sidebar --}}
            @include('staff.body.sidebar')


            <div class="page-wrapper">
                <div class="content container-fluid">
                    {{-- breadcrumb  starts--}}

                    {{-- breadcrumb  ends--}}

                    {{-- user_yield starts --}}
                    @yield('staff')
                    {{-- user_yield  ends--}}

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">
                                © <?php
                                    $copyYear = 2019; // Set your website start date
                                    $curYear = date('Y'); // Keeps the second year updated
                                    echo $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');
                                    ?>
                                Designed and Developed by <a class="text-primary" href="https://www.newinfo.com.ng/" target="_blank">Newinfo Global Solutions Ltd</a>.
                                <span  style="float:right" >This page took {{ round(microtime(true) - LARAVEL_START, 3) }} seconds to render</span>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="{{ asset('backend/staff/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/jquery.slimscroll.min.js') }}"></script>
            {{-- goal tracking --}}
        <script src="{{ asset('backend/staff/assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('backend/staff/assets/js/app.js') }}"></script>
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
        <script>
            $(document).ready(function(){
                // Read value on page load
                $("#result b").html($("#customRange").val());

                // Read value on change
                $("#customRange").change(function(){
                    $("#result b").html($(this).val());
                });
            });
        </script>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
               $('.ckeditor').ckeditor();
            });
        </script>

    </body>
</html>

