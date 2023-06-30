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

    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/plugins/morris/morris.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/style.css') }}"> --}}


    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/dataTables.bootstrap4.min.css') }}">

    <link href=" {{ asset('backend/human_resource/assets/toaster/toastr.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/human_resource/assets/css/style.css') }}">

    <link href=" https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href=" https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />



    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        {{-- header --}}
        @include('humanresource.body.header')

        {{-- sidebar --}}
        @include('humanresource.body.sidebar')

        <div class="page-wrapper">
            <div class="content container-fluid">

                {{-- breadcrumb --}}
                {{-- @include('human_resource.body.breadcrumb') --}}

                {{-- human_resource_yield Starts--}}
                @yield('humanresource')
                {{-- human_resource_yield ends--}}

            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">
                            ©
                            <?php
                                    $copyYear = 2019; // Set your website start date
                                    $curYear = date('Y'); // Keeps the second year updated
                                    echo $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');
                                    ?>
                            Designed and Developed by <a class="text-primary" href="https://www.newinfo.com.ng/"
                                target="_blank">Newinfo Global Solutions Ltd</a>.
                            <span style="float:right">This page took {{ round(microtime(true) - LARAVEL_START, 3) }}
                                seconds to render</span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('backend/human_resource/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/chart.js') }}"></script>

    <script src="{{ asset('backend/human_resource/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('backend/human_resource/assets/js/app.js') }}"></script>
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



    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
        $('#examples').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );

    </script>

    <!--validation JavaScript -->
    <script src="{{ asset('backend/human_resource/assets/validation/validate.min.js')}}"></script>
    <!--handlebars JavaScript -->
    <script src="{{ asset('backend/human_resource/assets/handlebars/handlebars.js')}}"></script>
    <!--notify cdnjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    {{-- sweetalert2 --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/human_resource/assets/sweetalert-code/code.js') }}"></script>
    <!-- Toaster js -->
    <script src="{{ asset('backend/human_resource/assets/toaster/toastr.min.js') }}"></script>

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

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    $(document).ready(function () {
        var form = $('.form'),
        cache_width = form.width(),
        a4 = [595.28, 841.89]; // for a4 size paper width and height

        $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });

        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                 img = canvas.toDataURL("image/png"),
                 doc = new jsPDF({
                     unit: 'px',
                     format: 'a4'
                 });
                doc.addImage(img, 'JPEG', 20, 20);
                doc.save('daily-report-pdf.pdf');
                form.width(cache_width);
            });
        }

        function getCanvas() {
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }
    });
    </script>


</body>

</html>
