@extends('staff.staff_master')
@section('title', 'Ride History')
@section('staff')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('staff.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
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

                        <th>Pickup Address</th>
                        <th>Pickup Date</th>
                        <th>Pickup Time</th>
                        <th>Dropoff Address</th>
                        <th>Note </th>
                        <th>Passengers No </th>
                        <th>Return Trip </th>
                        <th>Status </th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $items->pickup_address }}</td>
                        <td>
                            @if($items->pickup_date == NULL)<span class="text-danger">No Pickup Date</span>
                            @else
                            {{ $items->pickup_date }}
                            @endif
                        </td>
                        <td>{{ $items->pickup_time }}</td>


                        <td>{{ $items->dropoff_address }}</td>

                        <td>{{ Str::limit($items->note, 20) }}</td>

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
            <h5 class="modal-title">Add Goal Tracking</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Goal Type</label>
                            <select class="select">
                                <option>Invoice Goal</option>
                                <option>Event Goal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Subject</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Target Achievement</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Start Date <span class="text-danger">*</span></label>
                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>End Date <span class="text-danger">*</span></label>
                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="select">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div id="edit_goal" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Goal Tracking</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Goal Type</label>
                            <select class="select">
                                <option selected>Invoice Goal</option>
                                <option>Event Goal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Subject</label>
                            <input class="form-control" type="text" value="Test Goal">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label">Target Achievement</label>
                            <input class="form-control" type="text" value="Lorem ipsum dollar">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Start Date <span class="text-danger">*</span></label>
                            <div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>End Date <span class="text-danger">*</span></label>
                            <div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="customRange">Progress</label>
                            <input type="range" class="form-control-range form-range" id="customRange">
                            <div class="mt-2" id="result">Progress Value: <b></b></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4">Lorem ipsum dollar</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <select class="select">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="modal custom-modal fade" id="delete_goal" role="dialog">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body">
            <div class="form-header">
                <h3>Delete Goal Tracking List</h3>
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-btn delete-action">
                <div class="row">
                    <div class="col-6">
                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>






@endsection
