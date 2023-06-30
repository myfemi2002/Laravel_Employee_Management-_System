@extends('humanresource.humanresource_master')
@section('title', 'Client')
@section('humanresource')

<div class="content container-fluid">
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
                            <th>#</th>
                            <th>Client Name</th>
                            <th>Client ID</th>
                            <th>Staff Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Payment Status</th>
                            <th>Date of Creation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $key => $items)
                        <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->client_id }}</td>
                        <td>{{ $items->staff_name }}</td>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
