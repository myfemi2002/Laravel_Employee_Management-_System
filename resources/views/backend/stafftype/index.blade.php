
@extends('admin.admin_master')
@section('title', 'Staff Type')
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
                        <th>Name</th>
                        <th>Email </th>
                        <th>Phone </th>
                        <th>Staff Type </th>
                        <th>Account Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->email }}</td>
                        <td>{{ $items->phone }}</td>
                        <td>{{ $items->staff_type }}</td>
                        <td>
                            @if($items->status == 'active')
                            <span class="badge bg-inverse-success">Active</span>
                            @elseif($items->status == 'inactive')
                            <span class="badge bg-inverse-danger">Inactive</span>
                            @endif
                        </td>

                        <td class="text-end">

                                <a href="{{ route('staff-type.edit', $items->id) }}" class="btn btn-info btn-rounded btn-sm text-white mb-1" title="Edit Data" > <i class="fa fa-edit"></i></a>
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
