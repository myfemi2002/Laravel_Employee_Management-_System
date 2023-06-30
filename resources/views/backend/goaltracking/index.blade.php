@extends('admin.admin_master')
@section('title', 'Goal Tracking')
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
            <a href="{{ route('goaltracking.add') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add New</a>
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
                        <th>Goal Type</th>
                        <th>Staff Name</th>
                        <th>Target Achievement</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description </th>
                        <th>Status </th>
                        <th>Progress </th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        {{-- <td>{{ $items->goal_type_id }}</td> --}}

                        <td> {{ $items['goalType']['goal_name'] }} </td>
                        <td> {{ $items['staff']['name'] }} </td>
                        <td>{{ $items->target_achievement }}</td>
                        <td>{{ $items->start_date }}</td>
                        <td>{{ $items->end_date }}</td>
                        <td>{{ Str::limit($items->description, 20) }}</td>


                        <td> @if($items->status == 1)
                            <span class="badge rounded-pill bg-success">Active</span>
                            @else
                            <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>

                        <td>
                            @if ($items->progress == 100)
                            <p class="mb-1">Completed {{ $items->progress }}%</p>
                            <div class="progress" style="height:5px">
                                <div class="progress-bar bg-success progress-sm" style="width: {{ $items->progress }}%;height:10px;"></div>
                            </div>

                            @elseif ($items->progress > 50)
                            <p class="mb-1">Completed {{ $items->progress }}%</p>
                            <div class="progress" style="height:5px">
                                <div class="progress-bar bg-info progress-sm" style="width: {{ $items->progress }}%;height:10px;"></div>
                            </div>

                            @elseif ($items->progress > 50 && $items->progress > 75)
                            <p class="mb-1">Completed {{ $items->progress }}%</p>
                            <div class="progress" style="height:5px">
                                <div class="progress-bar bg-danger progress-sm" style="width: {{ $items->progress }}%;height:10px;"></div>
                            </div>

                            @elseif ($items->progress > 76 && $items->progress > 90)
                            <p class="mb-1">Completed {{ $items->progress }}%</p>
                            <div class="progress" style="height:5px">
                                <div class="progress-bar bg-info progress-sm" style="width: {{ $items->progress }}%;height:10px;"></div>
                            </div>

                            @else
                            <p class="mb-1">Completed {{ $items->progress }}%</p>
                            <div class="progress" style="height:5px">
                                <div class="progress-bar bg-warning progress-sm" style="width: {{ $items->progress }}%;height:10px;"></div>
                            </div>
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="{{ route('goaltracking.edit', $items->id) }}" class="btn btn-info btn-rounded btn-sm text-white mb-1" title="Update Data" > Update Data </i></a>
                            <a href="{{ route('goaltracking.delete', $items->id) }}"  class="btn btn-danger btn-rounded btn-sm mb-1"  id="delete" title="Delete Data" >Delete</i></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
