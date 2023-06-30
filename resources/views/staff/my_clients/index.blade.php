@extends('staff.staff_master')
@section('title', 'Client')
@section('staff')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">@yield('title')</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('staff.dashobard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="{{ route('myclients.add') }}" class="btn add-btn"><i class="fa fa-plus"></i>Add @yield('title')</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Client ID</th>
                            <th>Contact Person</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Payment Status</th>
                            <th>Date of Creation</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $key => $items)
                        <tr>
                        <td>{{ $key + 1 }}</td>

                        <td>{{ $items->name }}</td>
                        <td>{{ $items->client_id }}</td>
                        <td>{{ $items->staff_name }}</td>
                        {{-- <td> {{ $items['staff']['name'] }} </td> --}}
                        <td>{{ $items->email }}</td>
                        <td>{{ $items->phone }}</td>
                        <td>
                            @if($items->gender == '1')
                            <span>Male</span>
                            @elseif($items->gender == '2')
                            <span>Female</span>
                            @endif
                        </td>

                        <td>
                            @if($items->payment_status == '1')
                            <span class="badge bg-inverse-success">Paid</span>
                            @elseif($items->payment_status == '2')
                            <span class="badge bg-inverse-warning">Partially Paid</span>
                            @elseif($items->payment_status == '0')
                            <span class="badge bg-inverse-danger">Unpaid</span>
                            @endif
                        </td>

                        <td>
                            @if($items->created_at == NULL)<span class="text-danger">No Date Set</span>
                            @else
                            {{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }}
                            @endif
                        </td>
                        <td class="text-end">
                                <a href="{{ route('myclients.edit', $items->id) }}" class="btn btn-info btn-rounded btn-sm text-white mb-1" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                <a href="{{ route('myclients.delete', $items->id) }}"  class="btn btn-danger btn-rounded btn-sm mb-1"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
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
