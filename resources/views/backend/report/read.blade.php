@extends('admin.admin_master')
@section('title', 'Read Report')
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
                    <table id="examples" class="table cell-border display wrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Staff Name </th>
                                <th  style="word-break:break-all;">Report</th>
                                <th>Date&Time of Submission</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allData as $key => $items)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $items->staff_name }}</td>


                                <td  style="word-break:break-all;"><p>{{ strip_tags($items->report) }}</p></td>


                                <td>{{ $items->created_at }}</td>
                                {{-- <td> {{ $items->created_at->format('Y-m-d') }} </td> --}}

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
