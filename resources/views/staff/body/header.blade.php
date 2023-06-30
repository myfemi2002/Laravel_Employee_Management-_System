@php
$id = Auth::user()->id;
$staffData = App\Models\User::find($id);
$status = $staffData->status;

$allData = App\Models\SystemSetting::orderBy('system_name','DESC')->first();
@endphp

            <div class="header">
                <div class="header-left">
                    <a href="{{ route('staff.dashobard') }}" class="logo">
                        <img src="{{ (!empty($allData->system_logo)) ? url('upload/system_settings_images/'.$allData->system_logo):url('upload/no_image.jpg') }}" width="40" height="40" alt="">
                    </a>
                </div>
                <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
                </span>
                </a>
                <div class="page-title-box">
                    <h3>{{ $allData->system_title }}</h3>
                </div>
                <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
                <ul class="nav user-menu">

                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ (!empty($staffData->photo)) ? url('upload/staff_images/'.$staffData->photo):url('upload/no_image.jpg') }}" alt="">
                            <span class="status online"></span></span>
                            <span>{{ $staffData->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            @if($status === 'active')
                            <a class="dropdown-item" href="{{ route('staff.profile') }}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('staff.change.password') }}">Change Password</a>
                            @elseif($status === 'inactive')
                            <h4>Staff Account is <span class="text-warning">InActive</span> </h4>
                            @elseif($status === 'suspended')
                            <h4>Staff Account has been <span class="text-danger">Suspended</span> </h4>
                            @endif
                            <a class="dropdown-item" href="{{ route('staff.logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mobile-user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @if($status === 'active')
                        <a class="dropdown-item" href="{{ route('staff.profile') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('staff.change.password') }}">Change Password</a>
                        @elseif($status === 'inactive')
                        <h4>Staff Account is <span class="text-warning">InActive</span> </h4>
                        @elseif($status === 'suspended')
                        <h4>Staff Account has been <span class="text-danger">Suspended</span> </h4>
                        @endif
                        <a class="dropdown-item" href="{{ route('staff.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
