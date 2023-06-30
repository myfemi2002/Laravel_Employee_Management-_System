@extends('sales.sales_master')
@section('title', 'Dashboard')
@section('sales')

@php
// $carCount = DB::table('vechicles')->latest()->get();
// $allUserCount = DB::table('users')->latest()->get();
$allStaff = DB::table('users')->where('staff_type','independent')->orderBy('name','DESC')->get();
$clientsCount = DB::table('clients')->where('staff_type','independent')->orderBy('name','DESC')->get();
$ride = DB::table('ride_requests')->where('status','0')->where('staff_type','independent')->orderBy('name','DESC')->get();
// $leave = DB::table('leaves')->where('status','0')->where('staff_type','independent')->get();
@endphp

<div class="page-header">
    @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    @endphp
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Welcome {{ $adminData->name }}!</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ count($allStaff) }}</h3>
                    <span>All Sales Staff</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ count($clientsCount) }}</h3>
                    <span>Clients</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-car"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ count($ride) }}</h3>
                    <span>Ride Request</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-6 d-flex">
        @php
        $regular = App\Models\User::where('status','active')->where('staff_type','independent')->limit(4)->latest()->get();
        @endphp
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Independent Staff</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Staff Type</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($regular as $key => $staff)
                    <tr>

                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>
                            @if($staff->staff_type == 'independent')
                            <span class="badge bg-inverse-warning">Independent Staff</span>
                            @elseif($staff->staff_type == 'regular')
                            <span class="badge bg-inverse-primary">Regular Staff</span>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('sale-staff.view') }}">View all Independent Staff</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Clients</h3>
            </div>
            <div class="card-body">
                @php
                $allData = App\Models\Clients::where('staff_type','independent')->limit(4)->orderBy('name','DESC')->latest()->get();
                @endphp
                <div class="table-responsive">
                    <table class="table table-nowrap custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach($allData as $key => $items)
                        <tr>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->staff_name }}</td>
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
            <div class="card-footer">
                <a href="{{ route('sales-clients.view') }}">View all client</a>
            </div>
        </div>
    </div>

</div>



<div class="row">
    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Sales Attendance</h3>
            </div>
            <div class="card-body">
                @php
        $allActive = App\Models\Attendance::where('staff_type','independent')->limit(4)->orderBy('punch_in','DESC')->latest()->get();
        @endphp
                <div class="table-responsive">
                    <table class="table table-nowrap custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Puch In Time</th>
                                <th>Address In</th>
                                <th>Address Out</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($allActive as $key => $attendace)
                    <tr>

                        <td>{{ $attendace['staff']['name'] }}</td>
                        <td>@time($attendace->punch_in)</td>
                        <td>{{ Str::limit($attendace->address_in, 20) }}</td>
                        <td>{{ Str::limit($attendace->address_out, 20) }}</td>

                    </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('sales-attendance.view') }}">View all Sales Attendance</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex">
        @php
        $ride = App\Models\RideRequest::where('status','active')->limit(4)->orderBy('name','DESC')->latest()->get();


        @endphp
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Ride Request</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Pickup Address</th>
                                <th>Pickup Time</th>
                                <th>Pax No</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($ride as $key => $staff)
                    <tr>

                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->pickup_address }}</td>
                        <td>{{ $staff->pickup_time }}</td>
                        <td>{{ $staff->passengers_no }}</td>
                                </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('sale-ride.view') }}">View all Ride Request</a>
            </div>
        </div>
    </div>
</div>







@endsection

