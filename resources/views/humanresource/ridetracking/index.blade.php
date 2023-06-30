@extends('humanresource.humanresource_master')
@section('title', 'Ride')
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
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="examples" class="table table-striped custom-table display nowrap  table">
                <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th>Name</th>
                        <th>Pickup Addr</th>
                        <th>Pickup Date</th>
                        <th>Pickup Time</th>
                        <th>Drop-off Addr</th>
                        <th>Pax No </th>
                        <th>Return Trip </th>
                        <th>Final Status </th>
                        <th>HR Status </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->pickup_address }}</td>
                        <td>
                            @if($items->pickup_date == NULL)<span class="text-danger">No Pickup Date</span>
                            @else
                            {{ $items->pickup_date }}
                            @endif
                        </td>
                        <td>{{ $items->pickup_time }}</td>
                        <td>{{ $items->dropoff_address }}</td>
                        <td>{{ $items->passengers_no }}</td>
                        <td>{{ $items->return_trip }}</td>
                        <td> @if($items->status == 1)
                            <span class="badge rounded-pill bg-success">Approved</span>
                            @elseif ($items->status == 2)
                            <span class="badge rounded-pill bg-danger">Declined</span>
                            @elseif ($items->status == 0)
                            <span class="badge rounded-pill bg-warning">Pending</span>
                            @endif
                        </td>
                        <td> @if($items->hr_action == 1)
                            <span class="badge rounded-pill bg-success">Approved</span>
                            @elseif ($items->hr_action == 2)
                            <span class="badge rounded-pill bg-danger">Declined</span>
                            @elseif ($items->hr_action == 0)
                            <span class="badge rounded-pill bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-info btn-rounded btn-sm" data-bs-toggle="modal" data-bs-target="#add_goal{{ $items->id }}"><i class="fa fa-eye"></i></a>
                            @if($items->hr_action == '0')
                            <a href="{{ route('human-resource-approve.ride',$items->id) }}" class="btn btn-success btn-rounded btn-sm text-white mb-1" title="Approve" id="ApproveBtn" > <i class="fa fa-thumbs-up"></i> </a>
                            <a href="{{ route('human-resource-decline.ride',$items->id) }}" class="btn btn-danger btn-rounded btn-sm text-white mb-1" title="Decline" id="DeclineBtn"> <i class="fa fa-thumbs-down"></i> </a>
                            @else
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@foreach ($allData as $items)
<div id="add_goal{{ $items->id }}" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ride Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="col-form-label">Name:- {{ $items->name }}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-form-label ">Phone:- {{ $items->phone }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="col-form-label">Pickup Time:- {{ $items->pickup_time }}</label>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label">Passengers No:- {{ $items->passengers_no }}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-form-label">Return Trip:- {{ $items->return_trip }}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-form-label">Pickup Address:- {{ $items->pickup_address }}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-form-label">Dropoff Address:- {{ $items->dropoff_address }}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-form-label">Note:- {{ $items->note }}</label>
                    </div>
                    <div class="col-sm-12">
                        <label class="col-form-label">Status:-
                        @if($items->status == 1)
                        <span class="badge rounded-pill bg-success">Approved</span>
                        @elseif ($items->status == 2)
                        <span class="badge rounded-pill bg-success">Declined</span>
                        @elseif ($items->status == 0)
                        <span class="badge rounded-pill bg-danger">Pending</span>
                        @endif</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
