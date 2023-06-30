@extends('admin.admin_master')
@section('title', 'Policy')
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
            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_goal"><i class="fa fa-plus"></i> Add New Policy</a>
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
                        <th>Policy Type</th>
                        <th>Description </th>
                        {{-- <th>Download </th> --}}
                        <th>Date of Creation</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $items->policy_name }}</td>
                        <td>{!! Str::limit($items->description,50)!!} </td>

                        {{-- <td><a href="{{ url('/'.$items->policy_pdf) }}">{!! Str::limit($items->policy_pdf,10)!!}</a></td> --}}
                        <td>
                            @if($items->created_at == NULL)<span class="text-danger">No Date Set</span>
                            @else
                            {{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }}
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="{{ url('/'.$items->policy_pdf) }}" class="btn btn-warning btn-rounded btn-sm text-white mb-1" title="Download Data" > <i class="fa fa-download"></i></a>
                            <a href="{{ route('policytype.edit', $items->id) }}" class="btn btn-info btn-rounded btn-sm text-white mb-1" title="Edit Data" > <i class="fa fa-edit"></i></a>
                            <a href="{{ route('policytype.delete', $items->id) }}"  class="btn btn-danger btn-rounded btn-sm mb-1"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
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
            <form id="myForm" class="form" method="POST" action="{{ route('policytype.store') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-form-label">Policy Type Name</label>
                            <input class="form-control" name="policy_name" type="text" required>
                            <small class="form-control-feedback">
                            @error('policy_name')
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
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="col-form-label">Upload Pdf<span class="text-danger">*</span></label>
                            <input type="file" name="policy_pdf" class="form-control"  id="image"   />
                            <small class="form-control-feedback">
                            @error('policy_pdf')
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