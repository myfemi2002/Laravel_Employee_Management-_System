
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>

                            <li>
                                <a href="{{ route('sales.dashobard') }}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                            </li>

                            <li class="menu-title">
                                <span>Daily Report</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-book"></i> <span> Daily Report</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('sales-reports.today-view') }}">Today Daily Report </a></li>
                                    <li><a href="{{ route('sales-reports.current-week-view') }}">Current Week Daily Report </a></li>
                                    <li><a href="{{ route('sales-reports.last-week-view') }}">Last Week Daily Report </a></li>
                                    <li><a href="{{ route('sales-reports.month-view') }}">This Month Daily Report </a></li>
                                    <li><a href="{{ route('sales-reports.view') }}"> All Daily Report</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">
                                <span>Staff Attendance</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-marker"></i> <span> Staff Attendance</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('sales-attendance.today-view') }}"> Today Staff Attendance </a></li>

                                    <li><a href="{{ route('sales-attendance.last-week-view') }}">Last Week Staff Attendance </a></li>
                                    <li><a href="{{ route('sales-attendance.current-week-view') }}">Current Week Staff Attendance </a></li>
                                    <li><a href="{{ route('sales-attendance.month-view') }}"> This Month Staff Attendance </a></li>

                                    <li><a href="{{ route('sales-attendance.view') }}"> All Staff Attendance </a></li>
                                </ul>
                            </li>

                            <li class="menu-title">
                                <span>Staff</span>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-user"></i> <span> Staff</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('sale-staff.view') }}"> All Staff </a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('sales-clients.view') }}"><i class="la la-users"></i> <span>Clients</span></a>
                            </li>

                            <li class="submenu">
                                <a href="#"><i class="la la-rocket"></i> <span> Ride</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a href="{{ route('sale-ride.view') }}">Requested Rides</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
