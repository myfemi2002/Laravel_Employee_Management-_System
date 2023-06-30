@extends('staff.staff_master')
@section('title', 'Policy')
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
    </div>
</div>


<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th>Policy Type</th>
                        <th>Description </th>
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
                        <td>
                            @if($items->created_at == NULL)<span class="text-danger">No Date Set</span>
                            @else
                            {{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }}
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="{{ url('/'.$items->policy_pdf) }}" class="btn btn-warning btn-rounded btn-sm text-white mb-1" title="Download Data" > <i class="fa fa-download"></i></a>
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
