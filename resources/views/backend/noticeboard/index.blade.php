@extends('admin.admin_master')
@section('title', 'Notice')
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
        <div class="col-auto float-end ms-auto">
            <a href="{{ route('noticeboard.add') }}" class="btn add-btn"><i class="fa fa-plus"></i>Add @yield('title')</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th>Title</th>
                        <th>Date of Creation</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ Str::limit($items->post_notice, 50) }}</td>
                        <td>
                            @if($items->created_at == NULL)<span class="text-danger">No Date Set</span>
                            @else
                            {{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }}
                            @endif
                        </td>

                        <td class="text-end">
                                <a href="{{ route('noticeboard.edit', $items->id) }}" class="btn btn-info btn-rounded btn-sm text-white mb-1" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                <a href="{{ route('noticeboard.delete', $items->id) }}"  class="btn btn-danger btn-rounded btn-sm mb-1"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
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



{{-- @foreach ($allData as $items) --}}
{{-- <div id="edit_goal{{ $items->id }}" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit @yield('title')</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form method="POST" action="{{ route('goaltype.update') }}">
                    @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Goal Type Name</label>
                            <input class="form-control" name="goal_name" value="{{ $items->goal_name }}" type="text" required>
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
                            <textarea class="form-control" name="description" rows="4" required>{{ $items->description }}</textarea>
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
</div> --}}
{{-- @endforeach --}}




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
