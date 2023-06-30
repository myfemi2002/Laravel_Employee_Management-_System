@extends('humanresource.humanresource_master')
@section('title', 'Last Week Attendance')
@section('humanresource')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('human-resource.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-2">
                <div class="stats-info">
                    <h6>Punch-In</h6>
                    <h4> {{ $lastWeekUsersPunchInCount }} <span>this Week</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-2">
                <div class="stats-info">
                    <h6>Punch-In</h6>
                    <h4>{{ $lastMonthUsersPunchInCount }} <span>this month</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-2">
                <div class="stats-info">
                    <h6>Punch-Out</h6>
                    <h4>{{ $lastWeekUsersPunchOutCount }} <span>this Week</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-2">
                <div class="stats-info">
                    <h6>Punch-Out</h6>
                    <h4>{{ $lastMonthUsersPunchOutCount }} <span>this month</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-2">
                <div class="stats-info">
                    <h6>Total Punches</h6>
                    <h4>{{ $lastWeekUsersPunchInCount + $lastWeekUsersPunchOutCount }} <span>this Week</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-2">
                <div class="stats-info">
                    <h6>Total Punches</h6>
                    <h4>{{ $lastMonthUsersPunchInCount + $lastMonthUsersPunchOutCount }} <span>this Month</span></h4>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="examples" class="table table-striped custom-table display nowrap  table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Staff Name </th>

                                <th>Punch In Date </th>
                                <th>Punch In Time</th>
                                <th>Punch In Location</th>

                                <th>Punch Out Time</th>
                                <th>Punch Out Location</th>

                                <th>Production</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $attendace)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ date('d-m-Y',strtotime($attendace->date)) }}</td> --}}
                                <td>{{ $attendace['staff']['name'] }}</td>

                                <td>{{ date('d-m-Y',strtotime($attendace->punch_in)) }}</td>

                                <td>@time($attendace->punch_in)</td>
                                <td>{{ Str::limit($attendace->address_in, 20) }}</td>


                                <td>@if($attendace->punch_out)
                                    @time($attendace->punch_out)
                                    @endif
                                </td>

                                <td>{{ Str::limit($attendace->address_out, 20) }}</td>

                                <td>{{ ($attendace->production_time) }}</td>

                        <td>
                            <a class="btn btn-warning btn-rounded btn-sm"  title="Data Details" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal{{ $attendace->id }}"> <i class="fa fa-eye"></i></a>
                        </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section>

        <div class="col">

            @foreach ($allData as $attendace)
            <!-- Modal -->
            <div class="modal fade" id="exampleVerticallycenteredModal{{ $attendace->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Occupant's Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <h6 class="col">Staff Name:</h6>
                                <p class="col" style="text-transform: capitalize;">{{ $attendace['staff']['name'] }}</p>
                            </div>

                            <div class="row">
                                <h6 class="col">Date:</h6>
                                <p class="col">{{ date('d-m-Y',strtotime($attendace->punch_in)) }} <p>
                            </div>

                            <div class="row">
                                <h6 class="col">Punch In Time:</h6>
                                <p class="col">@time($attendace->punch_in)</p>
                            </div>

                            <div class="row">
                                <h6 class="col">Punch In Address:</h6>
                                <p class="col" style="text-transform: capitalize;">{{ $attendace->address_in }}</p>
                            </div>

                            <div class="row">
                                <h6 class="col">Punch Out Time:</h6>
                                <p class="col">
                                    @if($attendace->punch_out)
                                    @time($attendace->punch_out)
                                    @endif
                                </p>
                            </div>

                            <div class="row">
                                <h6 class="col">Punch Out Address:</h6>
                                <p class="col" style="text-transform: capitalize;">{{ $attendace->address_out }}</p>
                            </div>

                            <div class="row">
                                <h6 class="col">Production Time:</h6>
                                <p class="col">{{ ($attendace->production_time) }}</p>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <footer class="text-center">
                                <p>Copyright : &copy; 2019 - <script>document.write(new Date().getFullYear());</script> All rights reserved
                                    <i class="fa fa-hearto" aria-hidden="true"></i> by <a href="http://www.newinfo.com.ng/" target="_blank"><span>Newinfo</span></a>
                                </p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        </section>



</div>



@endsection
