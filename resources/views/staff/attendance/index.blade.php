@extends('staff.staff_master')
@section('title', 'Daily Attendances')
@section('staff')

<div class="row">


    <div class="col-md-4">
        <div class="card punch-status">
            <div class="card-body">
                <h5 class="card-title">Timesheet <small class="text-muted">{{ date('D, d M Y') }}</small></h5>

                <div class="punch-det">
                    @php
                    $attendance = Auth::user()->attendance_today;
                    @endphp
                    {{-- if statement here --}}
                    <h6>{{ $attendance ? 'Punched in at:' : 'Punch in for today' }}</h6>
                    {{-- <p id="punch-in-time">{{ $attendance ? date('', $attendance->punch_in) : '' }}</p> --}}
                    <p id="punch-in-time">@if ($attendance) @time($attendance->punch_in) @endif</p>
                </div>
                <div class="punch-info">
                    <div class="punch-hours">
                        <span>{{ $attendance->production_time ?? '--.--' }} </span>
                    </div>
                </div>
                <div class="punch-btn-section">
                    @if (is_null($attendance))
                    <a href="{{ route('attendance.punch-in') }}"  class="btn btn-success punch-btn push">Punch In</a>
                    @elseif($attendance && !$attendance->punch_out)
                    <a href="{{ route('attendance.punch-out') }}" class="btn btn-danger punch-btn push">Punch Out</a>
                    @else
                    <div class="punch-det">
                        <h6>Punched out at:</h6>
                        <p id="punch-in-time">@time($attendance->punch_out)</p>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card att-statistics">
            <div class="card-body">
                <h5 class="card-title">Statistics</h5>
                <div class="stats-list">
                    <div class="stats-info">
                        <p>Today <strong>{{ $attendance->production_time ?? '0 hrs' }} <small>/ 10 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%"
                                aria-valuenow="31" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>

                                    <th>Date </th>
                                    <th>Production</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reent_attendances as $attendace)
                                <tr>

                                    <td>@date($attendace->punch_in)</td>

                                    <td>{{ ($attendace->production_time) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="stats-info">
                        <p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%"
                                aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div> --}}
                    {{-- <div class="stats-info">
                        <p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%"
                                aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card recent-activity">
            <div class="card-body">
                <h5 class="card-title">Activity</h5>
                <ul class="res-activity-list">
                    @foreach ($reent_attendances as $attendace)
                    <li>
                        <p class="mb-0">Punch In at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            @time($attendace->punch_in)
                        </p>
                        <p class="res-activity-time">
                            <i class="fa fa-calendar"></i>
                            @date($attendace->punch_out)
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Punch Out at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            @time($attendace->punch_out)
                        </p>
                        <p class="res-activity-time">
                            <i class="fa fa-calendar"></i>
                            @date($attendace->punch_out)
                        </p>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date </th>
                        <th>Punch In</th>
                        <th>Punch Out</th>
                        <th>Production</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reent_attendances as $attendace)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>@date($attendace->punch_in)</td>

                        <td>@time($attendace->punch_in)</td>

                        <td>@if($attendace->punch_out)
                            @time($attendace->punch_out)
                            @endif
                        </td>
                        <td>{{ ($attendace->production_time) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    // var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    toastr.info('Allow location on this page to push in');
  }
}

function showPosition(position) {
    console.log('?lat=' + position.coords.latitude + '&lon=' + position.coords.longitude);
    var pushIn = $('a.push');
    // var pushIn = $('a#push-in');
    pushIn.attr('href', pushIn.attr('href') + '?lat=' + position.coords.latitude + '&lon=' + position.coords.longitude)
//   x.innerHTML = "Latitude: " + position.coords.latitude +
//   "<br>Longitude: " + position.coords.longitude;
}

$(function(){
    getLocation()
})
</script>
@endsection
