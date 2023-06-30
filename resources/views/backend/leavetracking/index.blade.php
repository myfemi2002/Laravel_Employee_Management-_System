@extends('admin.admin_master')
@section('title', 'Leave')
@section('admin')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashobard') }}">Dashboard</a></li>
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
                        <th>Staff Name</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>No Of Days</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> {{ $items['staff']['name'] }} </td>

                        <td> {{ $items['leaveType']['leave_name'] }} </td>
                        {{-- <td>{{ $items->goal_name }}</td> --}}
                        <td>{{ $items->start_date }}</td>
                        <td>{{ $items->end_date }}</td>

                        <td>{{ $items->no_of_days }}</td>

                        <td>{{ Str::limit($items->reason, 20) }}</td>
                        <td>
                            @if($items->status == '1')
                            <span class="badge bg-inverse-success">Approved</span>
                            @elseif($items->status == '2')
                            <span class="badge bg-inverse-danger">Declined</span>
                            @elseif($items->status == '0')
                            <span class="badge bg-inverse-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            @if($items->status == '0')
                            <a href="{{ route('approve.leave',$items->id) }}" class="btn btn-success btn-rounded btn-sm text-white mb-1" title="Approve" id="ApproveBtn" > <i class="fa fa-thumbs-up"></i> </a>
                            <a href="{{ route('decline.leave',$items->id) }}" class="btn btn-danger btn-rounded btn-sm text-white mb-1" title="Decline" id="DeclineBtn"> <i class="fa fa-thumbs-down"></i> </a>
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

@endsection
