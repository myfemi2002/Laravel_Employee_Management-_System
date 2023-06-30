@extends('staff.staff_master')
@section('title', 'Goal')
@section('staff')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('staff.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
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
                        <th>Goal Type</th>
                        <th>Subject</th>
                        <th>Target Achievement</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Description </th>
                        <th>Status </th>
                        <th>Progress </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allData as $key => $items)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> {{ $items['goalType']['goal_name'] }} </td>
                        {{--
                        <td> {{ $items['staff']['name'] }} </td>
                        --}}
                        <td>{{ $items->subject }}</td>
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
                        <td>
                            <a class="btn btn-warning btn-rounded btn-sm"  title="Data Details" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal{{ $items->id }}"> <i class="fa fa-eye"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<section>
    <div class="col">
        @foreach ($allData as $items)
        <!-- Modal -->
        <div class="modal fade" id="exampleVerticallycenteredModal{{ $items->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Goal's Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <h6 class="col">Goal Type:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items['goalType']['goal_name'] }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col">Subject:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items->subject }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col">Target Achievement:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items->target_achievement }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col">Start Date:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items->start_date }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col">End Date:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items->end_date }}</p>
                        </div>
                        <div class="row">
                            <h6 class="col">Progress:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items->progress }}%</p>
                        </div>
                        <div class="row">
                            <h6 class="col">Status:</h6>
                            <p class="col" style="text-transform: capitalize;">
                                @if($items->status == 1)
                                <span class="badge rounded-pill bg-success">Active</span>
                                @else
                                <span class="badge rounded-pill bg-danger">InActive</span>
                                @endif
                            </p>
                        </div>
                        <div class="row">
                            <h6 class="col">Description:</h6>
                            <p class="col" style="text-transform: capitalize;">{{ $items->description }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <footer class="text-center">
                            <p>
                                Copyright : &copy; 2019 - <script>document.write(new Date().getFullYear());</script> All rights reserved
                                <i class="fa fa-hearto" aria-hidden="true"></i> by <a href="http://www.newinfo.com.ng/" target="_blank"><span>Newinfo</span></a>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
