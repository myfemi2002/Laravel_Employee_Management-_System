@extends('sales.sales_master')
@section('title', 'Staff')
@section('sales')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sales.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>

<div class="row staff-grid-row">
@foreach ($allData as $items)
<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
    <div class="profile-widget">
        <div class="profile-img">
            <a href="#" class="avatar"><img src="{{ (!empty($items->photo)) ? url('upload/staff_images/'.$items->photo):url('upload/no_image.jpg') }}" alt=""></a>
        </div>

        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#">{{ $items->name }}</a></h4>
        @if($items->designations == NULL)
        <span class="text-danger">No Designations</span>
        @else
        <div class="small text-muted">{{ $items->designations }}</div>
        @endif
        <br>

        @if($items->staff_type == NULL)
        <span class="text-danger">Not Set</span>
        @elseif($items->staff_type == 'regular')
        <div class="small text-info">Regular Staff</div>
        @elseif($items->staff_type == 'independent')
        <div class="small text-info">Independent Staff</div>
        @endif
    </div>
</div>
@endforeach

</div>

@endsection
