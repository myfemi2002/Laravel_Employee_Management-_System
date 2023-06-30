@extends('staff.staff_master')
@section('title', 'Dashboard')
@section('staff')
{{-- breadcrumb  starts--}}
<div class="row">
    @php
    $id = Auth::user()->id;
    $userData = App\Models\User::find($id);
    $status = $userData->status;
    @endphp

@php
$id = Auth::user()->id;
$staffData = App\Models\User::find($id);
@endphp

    <div class="col-md-12">
        <div class="welcome-box">
            <div class="welcome-img">
                <img alt="" src="{{ (!empty($staffData->photo)) ? url('upload/staff_images/'.$staffData->photo):url('upload/no_image.jpg') }}">
                {{-- <a href="#"><img alt="{{ $staffData->name }}" src="{{ (!empty($staffData->photo)) ? url('upload/staff_images/'.$staffData->photo):url('upload/no_image.jpg') }}"></a> --}}

            </div>
            <div class="welcome-det">
                <h3>Welcome, {{ $userData->name }}</h3>
                <p>{{ date('D, d  M Y') }}</p>
                {{-- <p> {{ \Carbon\Carbon::now()->format('D, d  M Y') }}</p> --}}
            </div>
        </div>
    </div>
</div>
{{-- breadcrumb  ends--}}

@if($status === 'active')
<div class="row">
    <div class="col-lg-6 col-md-6">

        <section class="dash-section">
        @php
        $notice = App\Models\NoticeBoard::orderBy('post_notice','ASC')->get();
        @endphp
            <h1 class="dash-sec-title">Today</h1>
            <div class="dash-sec-content">
                @foreach ($notice as $items )
                <div class="dash-info-list">
                    <a href="#" class="dash-card text-danger">
                        <div class="dash-card-container">
                            <div class="dash-card-icon">
                                <i class="fa fa-hourglass-o"></i>
                            </div>
                            <div class="dash-card-content">
                                <p>{{ $items->post_notice }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>


    <div class="col-lg-6 col-md-6">
        @php
            $id = Auth::user()->id;
            $allData = App\Models\Clients::where('user_id',$id)->orderBy('id','ASC')->limit(4)->get();
        @endphp
    <section class="dash-section">
        <h1 class="dash-sec-title">My Clients</h1>


        <div class="card card-table flex-fill">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                    <td>{{ $items->name }}</td>
                    <td>{{ $items->email }}</td>
                    <td>{{ $items->phone }}</td>
                    <td>
                        @if($items->payment_status == '1')
                        <span class="badge bg-inverse-success">Paid</span>
                        @elseif($items->payment_status == '2')
                        <span class="badge bg-inverse-warning">Partially Paid</span>
                        @elseif($items->payment_status == '0')
                        <span class="badge bg-inverse-danger">Unpaid</span>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    </div>


    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Your Latest Attendance</h3>
            </div>
            <div class="card-body">
                @php
                $id = Auth::user()->id;
                $allData = App\Models\Attendance::where('user_id',$id)->orderBy('id','ASC')->limit(4)->get();
            @endphp

                <div class="table-responsive">
                    <table class="table table-nowrap custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Punch In Time</th>
                                <th>Punch Out Time</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($allData as $key => $attendace)
                    <tr>

                        <td>{{ $attendace['staff']['name'] }}</td>
                        <td>@time($attendace->punch_in)</td>
                        <td>@time($attendace->punch_out)</td>

                    </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('punch.view') }}">View Attendance</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
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





    {{-- <div class="col-md-4">
        <div class="card punch-status">
            <div class="card-body">
                <h5 class="card-title">Timesheet <small class="text-muted">11 Mar 2019</small></h5>

                <form id="myForm" class="form" method="POST" action="{{ route('attendance.date') }}">
                    @csrf
                    <div class="punch-det">
                        <h6>Punch In at</h6>
                        <p>Wed, 11th Mar 2019 10.00 AM</p>
                    </div>
                    <div class="punch-info">
                        <div class="punch-hours">
                            <span>3.45 hrs</span>
                        </div>
                    </div>
                    <div class="punch-btn-section">
                        <button  type="submit" class="btn btn-primary punch-btn"> + </button>
                    </div>
                </form>

                <div class="statistics">
                    <div class="row">
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box">
                                <p>Break</p>
                                <h6>1.21 hrs</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box">
                                <p>Overtime</p>
                                <h6>3 hrs</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@elseif($status === 'inactive')
<h4>Staff Account is <span class="text-warning">InActive</span> </h4>
<p> Awaiting Admin Approval.</p>
@elseif($status === 'suspended')
<h4>Staff Account has been <span class="text-danger">Suspended</span> </h4>
@endif

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
