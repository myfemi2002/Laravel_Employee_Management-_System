
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>

                            <li>
                                <a href="{{ route('human-resource.dashobard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Assign</span>
                            </li>

                            <li>
                                <a href="{{ route('human-resource-goal.view') }}"><i class="la la-crosshairs"></i> <span>Goals</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Daily Report</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-book"></i> <span> Daily Report</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('human-resource-reports.today-view') }}">Today Daily Report </a></li>
                                    <li><a href="{{ route('human-resource-reports.current-week-view') }}">Current Week Daily Report </a></li>
                                    <li><a href="{{ route('human-resource-reports.last-week-view') }}">Last Week Daily Report </a></li>
                                    <li><a href="{{ route('human-resource-reports.month-view') }}">This Month Daily Report </a></li>
                                    <li><a href="{{ route('human-resource-reports.view') }}"> All Daily Report</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">
                                <span>Staff Attendance</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-marker"></i> <span> Staff Attendance</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('human-resource-attendance.today-view') }}"> Today Staff Attendance </a></li>
                                    <li><a href="#"> This Week Staff Attendance </a></li>



                                    <li><a href="{{ route('human-resource-attendance.last-week-view') }}">Last Week Staff Attendance </a></li>
                                    <li><a href="{{ route('human-resource-attendance.current-week-view') }}">Current Week Staff Attendance </a></li>


                                    <li><a href="{{ route('human-resource-attendance.month-view') }}"> This Month Staff Attendance </a></li>
                                    <li><a href="{{ route('human-resource-attendance.view') }}"> All Staff Attendance </a></li>
                                </ul>
                            </li>

                            <li class="menu-title">
                                <span>Staff</span>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-user"></i> <span> Staff</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('human-resource-staff.view') }}"> All Staff </a></li>
                                    <li><a href="{{ route('human-resource-leave.view') }}"> Staff Leave</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('human-resource-clients.view') }}"><i class="la la-users"></i> <span>Clients</span></a>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-rocket"></i> <span> Ride</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('human-resource-ride.view') }}">Requested Rides</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('human-resource-policy.view') }}"><i class="la la-file-pdf-o"></i> <span>Policies</span></a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
