@extends('staff.staff_master')
@section('title', 'Leave Status')
@section('staff')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>

        <div class="col-auto float-end ms-auto">
            <a href="{{ route('staffleaverequest.view') }}" class="btn add-btn"><i class="fa fa-plus"></i> Leave Request</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>No of Days</th>
                        <th>Reason </th>
                        <th>Status </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>

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
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<div id="add_goal" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add @yield('title')</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="myForm" class="form" method="POST" action="{{ route('goaltype.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Goal Type Name</label>
                            <input class="form-control" name="goal_name" type="text" required>
                            <small class="form-control-feedback">
                            @error('goal_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="4" required></textarea>
                            <small class="form-control-feedback">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection
