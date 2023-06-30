
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>

                            <li>
                                <a href="{{ route('admin.dashobard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                            </li>

                            <li>
                                <a href="{{ route('noticeboard.view') }}"><i class="la la-windows"></i> <span>Notice Board</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Assign</span>
                            </li>

                            <li>
                                <a href="{{ route('goaltracking.view') }}"><i class="la la-crosshairs"></i> <span>Assign Goal </span></a>
                            </li>

                            <li>
                                <a href="{{ route('assign.view') }}"><i class="la la-pencil"></i> <span>Assign Designations</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Daily Report</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-book"></i> <span> Daily Report</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('reports.today-view') }}">Today Daily Report </a></li>
                                    <li><a href="{{ route('reports.current-week-view') }}">Current Week Daily Report </a></li>
                                    <li><a href="{{ route('reports.last-week-view') }}">Last Week Daily Report </a></li>
                                    <li><a href="{{ route('reports.month-view') }}">This Month Daily Report </a></li>
                                    <li><a href="{{ route('reports.view') }}"> All Daily Report</a></li>
                                    <li><a href="{{ route('reports.read') }}"> Read All Report</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">
                                <span>Staff Attendance</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-marker"></i> <span> Staff Attendance</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('attendance.today-view') }}">Today Staff Attendance </a></li>
                                    <li><a href="{{ route('attendance.currentweek-view') }}">Current Week Staff Attendance </a></li>
                                    <li><a href="{{ route('attendance.lastweek-view') }}">Last Week Staff Attendance </a></li>
                                    <li><a href="{{ route('attendance.month-view') }}">This Month Staff Attendance </a></li>
                                    <li><a href="{{ route('attendance.view') }}"> All Staff Attendance </a></li>
                                </ul>
                            </li>

                            <li class="menu-title">
                                <span>Staff</span>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-user"></i> <span> Staff</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('staff.view') }}"> All Staff </a></li>
                                    <li><a href="{{ route('active.view') }}"> Active Staff </a></li>
                                    <li><a href="{{ route('inactive.view') }}"> Inactive Staff </a></li>
                                    <li><a href="{{ route('regular-staff.view') }}"> Regular Staff </a></li>
                                    <li><a href="{{ route('independent-staff.view') }}"> Independent Staff </a></li>

                                    <li><a href="{{ route('leave.view') }}"> Staff Leave </a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('clients.view') }}"><i class="la la-users"></i> <span>Clients</span></a>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-rocket"></i> <span> Ride</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('ride.view') }}">Requested Rides</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('policytype.view') }}"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Setup</span>
                            </li>
                            <li>
                                <a href="{{ route('goaltype.view') }}"><i class="la la-plane"></i> <span> Goal Type</span></a>
                            </li>

                            <li>
                                <a href="{{ route('designations.view') }}"><i class="la la-money"></i> <span> Designations Type</span></a>
                            </li>

                            <li>
                                <a href="{{ route('vechicle.view') }}"><i class="la la-car"></i> <span> Vehicle Type</span></a>
                            </li>

                            <li>
                                <a href="{{ route('leavetype.view') }}"><i class="la la-leaf"></i> <span> Leave Type</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Authentication</span>
                            </li>

                            <li>
                                <a href="{{ route('create-staff.view') }}"><i class="la la-bell"></i> <span>Create Admin</span></a>
                            </li>

                            <li>
                                <a href=""><i class="la la-bell"></i> <span>Assign Admin Role </span></a>
                            </li>

                            <li>
                                <a href="{{ route('staff-type.view') }}"><i class="la la-fire"></i> <span>Change Staff Type</span></a>
                            </li>

                            <li>
                                <a href="{{ route('adminstaff-forgot-password.view') }}"><i class="la la-fan"></i> <span>Change Staff Password</span></a>
                            </li>

                            <li class="menu-title">
                                <span>System Setting</span>
                            </li>

                            <li>
                                <a href="{{ route('systemsettings.view') }}"><i class="la la-cog"></i> <span>Settings</span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
