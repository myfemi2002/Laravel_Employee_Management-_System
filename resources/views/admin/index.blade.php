@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('admin')

@php
// $carCount = DB::table('vechicles')->latest()->get();
// $allUserCount = DB::table('users')->latest()->get();
$allStaff = DB::table('users')->where('role','staff')->orderBy('name','DESC')->get();
$clientsCount = DB::table('clients')->orderBy('name','DESC')->get();
$ride = DB::table('ride_requests')->where('status','0')->orderBy('name','DESC')->get();
$leave = DB::table('leaves')->where('status','0')->get();
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
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ count($allStaff) }}</h3>
                    <span>All Staff</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
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
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
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
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-leaf"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ count($leave) }}</h3>
                    <span>Leave Request</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill dash-statistics">
            <div class="card-body">
                <h5 class="card-title">Statistics</h5>
                <div class="stats-list">
                    <div class="stats-info">
                        <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">Task Statistics</h4>
                <div class="statistics">
                    <div class="row">
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box mb-4">
                                <p>Total Tasks</p>
                                <h3>385</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box mb-4">
                                <p>Overdue Tasks</p>
                                <h3>19</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress mb-4">
                    <div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
                </div>
                <div>
                    <p><i class="fa fa-dot-circle-o text-purple me-2"></i>Completed Tasks <span class="float-end">166</span></p>
                    <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Inprogress Tasks <span class="float-end">115</span></p>
                    <p><i class="fa fa-dot-circle-o text-success me-2"></i>On Hold Tasks <span class="float-end">31</span></p>
                    <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Pending Tasks <span class="float-end">47</span></p>
                    <p class="mb-0"><i class="fa fa-dot-circle-o text-info me-2"></i>Review Tasks <span class="float-end">5</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ms-2">5</span></h4>
                <div class="leave-info-box">
                    <div class="media d-flex align-items-center">
                        <a href="profile.html" class="avatar"><img alt="" src="{{ asset('backend/admin/assets/img/user.jpg') }}"></a>
                        <div class="media-body flex-grow-1">
                            <div class="text-sm my-0">Martin Lewis</div>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-6">
                            <h6 class="mb-0">4 Sep 2019</h6>
                            <span class="text-sm text-muted">Leave Date</span>
                        </div>
                        <div class="col-6 text-end">
                            <span class="badge bg-inverse-danger">Pending</span>
                        </div>
                    </div>
                </div>
                <div class="leave-info-box">
                    <div class="media d-flex align-items-center">
                        <a href="profile.html" class="avatar"><img alt="" src="{{ asset('backend/admin/assets/img/user.jpg') }}"></a>
                        <div class="media-body flex-grow-1">
                            <div class="text-sm my-0">Martin Lewis</div>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-6">
                            <h6 class="mb-0">4 Sep 2019</h6>
                            <span class="text-sm text-muted">Leave Date</span>
                        </div>
                        <div class="col-6 text-end">
                            <span class="badge bg-inverse-success">Approved</span>
                        </div>
                    </div>
                </div>
                <div class="load-more text-center">
                    <a class="text-dark" href="javascript:void(0);">Load More</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Clients</h3>
            </div>
            <div class="card-body">
                @php
                $allData = App\Models\Clients::limit(4)->orderBy('name','DESC')->get();
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
                <a href="{{ route('clients.view') }}">View all client</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Active Staff</h3>
            </div>
            <div class="card-body">
                @php
        $allActive = App\Models\User::where('role','staff')->where('status','active')->limit(4)->orderBy('name','DESC')->get();
        @endphp
                <div class="table-responsive">
                    <table class="table table-nowrap custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($allActive as $key => $staff)
                    <tr>

                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>
                            @if($staff->status == 'active')
                            <span class="badge bg-inverse-success">Active</span>
                            @elseif($staff->status == 'inactive')
                            <span class="badge bg-inverse-danger">Inactive</span>
                            @endif
                        </td>
                                </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('active.view') }}">View all active staff</a>
            </div>
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-6 d-flex">
        @php
        $regular = App\Models\User::where('staff_type','regular')->limit(4)->orderBy('name','DESC')->get();
        @endphp
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Regular Staff</h3>
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
                        <td><span class="badge bg-inverse-success">{{ $staff->staff_type }}</span></td>
                    </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('regular-staff.view') }}">View all Regular Staff</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex">
        @php
        $independent = App\Models\User::where('staff_type','independent')->limit(4)->orderBy('name','DESC')->get();
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
                    @foreach($independent as $key => $staff)
                    <tr>

                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td><span class="badge bg-inverse-success">{{ $staff->staff_type }}</span></td>
                    </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('independent-staff.view') }}">View all Independent Staff</a>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6 d-flex">
        @php
        $allInactive = App\Models\User::where('role','staff')->where('status','inactive')->limit(4)->orderBy('name','DESC')->get();
        @endphp
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">Latest Inactive Staff</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($allInactive as $key => $staff)
                    <tr>

                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->phone }}</td>
                        <td>
                            @if($staff->status == 'active')
                            <span class="badge bg-inverse-success">Active</span>
                            @elseif($staff->status == 'inactive')
                            <span class="badge bg-inverse-danger">Inactive</span>
                            @endif
                        </td>
                                </tr>
                    @endforeach
                        </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('inactive.view') }}">View all Inactive Staff</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex">
        @php
        $ride = App\Models\RideRequest::where('status','active')->limit(4)->orderBy('name','DESC')->get();


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
                <a href="{{ route('ride.view') }}">View all Ride Request</a>
            </div>
        </div>
    </div>

</div>






@endsection
