@php
$id = Auth::user()->id;
$adminData = App\Models\User::find($id);

$allData = App\Models\SystemSetting::orderBy('system_name','DESC')->first();
@endphp
            <div class="header">
                <div class="header-left">
                    <a href="{{ route('admin.dashobard') }}" class="logo">
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
                        <span class="user-img"><img src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="">
                        <span class="status online"></span></span>
                        <span>{{ $adminData->name }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.change.password') }}">Change Password</a>
                            <a class="dropdown-item" href="{{ route('systemsettings.view') }}">Settings</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mobile-user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('admin.change.password') }}">Change Password</a>
                        <a class="dropdown-item" href="{{ route('systemsettings.view') }}">Settings</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                    </div>
                </div>
            </div>
