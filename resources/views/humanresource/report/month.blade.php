@extends('humanresource.humanresource_master')
@section('title', 'Month Daily Report')
@section('humanresource')



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
                                <th>Staff Name </th>
                                <th>Date </th>
                                <th>Report</th>
                                <th>Date of Creation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $items)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $items->staff_name }}</td>
                                <td>{{ date('d-m-Y',strtotime($items->created_at)) }}</td>



                                <td>{{ Str::limit($items->report, 20) }}</td>

                                <td>
                                    @if($items->created_at == NULL)<span class="text-danger">No Date Set</span>
                                    @else
                                    {{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }}
                                    @endif
                                </td>


                        <td>
                            <a href="{{ route('human-resource-reports.edit', $items->id) }}" class="btn btn-warning btn-rounded btn-sm text-white mb-1" title="Edit Data" > <i class="fa fa-eye"></i></a>
                        </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
