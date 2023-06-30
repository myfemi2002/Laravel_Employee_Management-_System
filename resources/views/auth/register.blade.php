<!DOCTYPE html>
@php
$allData = App\Models\SystemSetting::orderBy('system_name','DESC')->first();
@endphp
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Newinfo - Admin">
        <meta name="keywords" content="admin">
        <meta name="author" content="Newinfo - Admin">
        <meta name="robots" content="noindex, nofollow">
        <title>Register - {{ $allData->system_title }} </title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ (!empty($allData->system_favion)) ? url('upload/system_settings_images/'.$allData->system_favion):url('upload/no_image.jpg') }}">

        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/line-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/plugins/morris/morris.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/style.css') }}"> --}}


        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/dataTables.bootstrap4.min.css') }}">


        <link href=" {{ asset('backend/staff/assets/toaster/toastr.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('backend/staff/assets/css/style.css') }}">

    </head>
    <body class="account-page">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="container">
                    <div class="account-logo">
                        <a href="/"><img src="{{ (!empty($allData->system_favion)) ? url('upload/system_settings_images/'.$allData->system_favion):url('upload/no_image.jpg') }}" alt="Newinfo's Technologies"></a>
                    </div>
                    <div class="row">
                        <div class="col-md-9 mx-auto">
                            <div class="card">

                                <div class="card-body">
                                    <h3 class="card-title text-primary mt-2">Personal Informations </h3>
                                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                                        @csrf

                                        <input  type="text" hidden name="uuid" value="{{ substr(rand(0,time()),0,7) }}">
                                        <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                                        <input required="" type="text" class="form-control" name="name" placeholder="Name">
                                        <small class="form-control-feedback">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone<span class="text-danger">*</span></label>
                                        <input required="" type="tel" class="form-control" name="phone" placeholder="Phone">
                                        <small class="form-control-feedback">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Username<span class="text-danger">*</span></label>
                                        <input required="" type="text" class="form-control" name="username" placeholder="Username">
                                        <small class="form-control-feedback">
                                        @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Email<span class="text-danger">*</span></label>
                                        <input required="" type="email" class="form-control" name="email" placeholder="Email">
                                        <small class="form-control-feedback">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Password<span class="text-danger">*</span></label>
                                        <input required="" type="password" class="form-control" name="password" placeholder="Password">
                                        <small class="form-control-feedback">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Repeat Password<span class="text-danger">*</span></label>
                                        <input required="" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                        <small class="form-control-feedback">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Date of Birthday <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" name="dob" type="text" >
                                            <small class="form-control-feedback">
                                            @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Address<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="address" placeholder="Address">
                                        <small class="form-control-feedback">
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Nationality<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="nationality" placeholder="Nationality">
                                        <small class="form-control-feedback">
                                        @error('nationality')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Religion<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="religion" placeholder="Religion">
                                        <small class="form-control-feedback">
                                        @error('religion')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Country<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="country" placeholder="Country">
                                        <small class="form-control-feedback">
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">State<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="state" placeholder="State">
                                        <small class="form-control-feedback">
                                        @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Marital Status<span class="text-danger">*</span></label>
                                        <select class="select" name="marital_status" required>
                                            <option value="" selected="" disabled="">-- Select --</option>
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
                                        </select>
                                        <small class="form-control-feedback">
                                        @error('marital_status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Gender<span class="text-danger">*</span></label>
                                        <select class="select" name="gender" required>
                                            <option value="" selected="" disabled="">-- Select --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <small class="form-control-feedback">
                                        @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Staff Type<span class="text-danger">*</span></label>
                                        <select class="select" name="staff_type" required>
                                            <option value="" selected="" disabled="">-- Select --</option>
                                            <option value="regular">Regular Staff</option>
                                            <option value="independent">Independent Staff</option>
                                        </select>
                                        <small class="form-control-feedback">
                                        @error('staff_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Appointment/Joining Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" name="doj" type="text" >
                                            <small class="form-control-feedback">
                                            @error('doj')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Profile Picture<span class="text-danger">*</span></label>
                                        <input type="file" name="photo" class="form-control"  id="image"   />
                                        <small class="form-control-feedback">
                                        @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin" style="width:100px; height: 100px;"/>
                                    </div>
                                </div>

                                <h5  class="text-primary mt-2">Primary Contact </h5>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="pemer_con_name" placeholder="Primary Contact Name">
                                        <small class="form-control-feedback">
                                        @error('pemer_con_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Relationship<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="pemer_con_relationship" placeholder="Primary Contact Relationship">
                                        <small class="form-control-feedback">
                                        @error('pemer_con_relationship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="pemer_con_phone" placeholder="Primary Contact Phone">
                                        <small class="form-control-feedback">
                                        @error('pemer_con_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <h5  class="text-primary mt-2">Secondary Contact </h5>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="semer_con_name" placeholder="Secondary Contact Name">
                                        <small class="form-control-feedback">
                                        @error('semer_con_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Relationship<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="semer_con_relationship" placeholder="Secondary Contact Relationship">
                                        <small class="form-control-feedback">
                                        @error('semer_con_relationship')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone<span class="text-danger">*</span></label>
                                        <input class="form-control"  type="text" required="" name="semer_con_phone" placeholder="Secondary Contact Phone">
                                        <small class="form-control-feedback">
                                        @error('semer_con_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>
                                <h3 class="text-primary">Guarantor's Form </h3>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label">Upload Guarantor's Form<span class="text-danger">*</span></label>
                                        <input type="file" name="guarantor_form" class="form-control"  id="images"   />
                                        <small class="form-control-feedback">
                                        @error('guarantor_form')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <img id="showImages" src="{{ url('upload/no_image.jpg') }}" alt="user" style="width:100px; height: 100px;"/>
                                    </div>
                                </div>







                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit">Register</button>
                                </div>
                                <div class="account-footer">
                                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{ asset('backend/admin/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/jquery.slimscroll.min.js') }}"></script>
        {{-- <script src="{{ asset('backend/admin/assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/chart.js') }}"></script> --}}

        <script src="{{ asset('backend/admin/assets/js/select2.min.js') }}"></script>
        {{-- <script src="{{ asset('backend/admin/assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/dataTables.bootstrap4.min.js') }}"></script> --}}
        <script src="{{ asset('backend/admin/assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('backend/admin/assets/js/app.js') }}"></script>
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

        <!-- Toaster js -->
        <script src="{{ asset('backend/staff/toaster/toastr.min.js') }}"></script>

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


        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#images').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImages').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    </body>
</html>
