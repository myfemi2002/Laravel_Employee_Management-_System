
            @php
            $id = Auth::user()->id;
            $staffId = App\Models\User::find($id);
            $status = $staffId->status;

            $prefix = Request::route()->getPrefix();
            $route = Route::current()->getName();
            @endphp
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>
                            <li>
                                <a href="{{ route('staff.dashobard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                            </li>

                            @if($status === 'active')
                            <li>
                                <a href="{{ route('staffreport.view') }}"><i class="la la-pie-chart"></i> <span>Daliy Report</span></a>
                            </li>

                            <li>
                                <a href="{{ route('punch.view') }}"><i class="la la-file"></i> <span>Attendance</span></a>
                            </li>

                            <li>
                                <a href="{{ route('goal.view') }}"><i class="la la-crosshairs"></i> <span>Goals</span></a>
                            </li>

                            {{-- <li>
                                <a href="#"><i class="la la-object-group"></i> <span>Staff Id Card</span></a>
                            </li> --}}

                            <li>
                                <a href="{{ route('myclients.view') }}"><i class="la la-exclamation-triangle"></i> <span>My Clients</span></a>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-leaf"></i> <span> Leave</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('staffleaverequest.view') }}">Leave Request</a></li>

                                    <li><a href="{{ route('staffleavestatus.view') }}">Leave Status</a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-rocket"></i> <span> Ride</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('riderequest.add') }}">Ride Request</a></li>

                                    <li><a href="{{ route('riderequest.history') }}">Ride History</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('policy.view') }}"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
                            </li>


        @elseif($status === 'inactive')
        @elseif($status === 'suspended')
        @endif

                        </ul>
                    </div>
                </div>
            </div>
