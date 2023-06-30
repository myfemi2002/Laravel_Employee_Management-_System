@extends('admin.admin_master')
@section('title', 'Admin Created Staff & Role')
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
            <a href="{{ route('create.staff') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add New</a>
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
                        <th>Status </th>
                        <th>Role</th>
                        {{-- <th class="text-end">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->email }}</td>
                        <td>{{ $items->phone }}</td>
                        <td>
                            @if($items->status == 'active')
                            <span class="badge bg-inverse-success">Active</span>
                            @elseif($items->status == 'inactive')
                            <span class="badge bg-inverse-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            @if($items->role == 'hr')
                            <span class="badge bg-inverse-warning">Human Resource</span>
                            @elseif($items->role == 'sales')
                            <span class="badge bg-inverse-primary">Sales</span>
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
