@extends('admin.admin_master')
@section('title', 'Report Details')
@section('admin')

@php
$id = Auth::user()->id;
$adminData = App\Models\User::find($id);

$allData = App\Models\SystemSetting::orderBy('system_name','DESC')->first();
@endphp

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
                    <div class="btn-group btn-group-sm">
                        <button  id="create_pdf" class="btn btn-danger">Generate PDF</button>
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>

                    </div>
                </div>
            </div>
        </div>

        <form class="form">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">Report Page for {{ $editData->staff_name }}</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{ (!empty($allData->system_logo)) ? url('upload/system_settings_images/'.$allData->system_logo):url('upload/no_image.jpg') }}" class="inv-logo" alt="">

                                    <ul class="list-unstyled mb-0">
                                        <li>Gross Assets and Properties Limited</li>
                                        <li> 24 Bamishile Street, Allen 101233,</li>
                                        <li> Ikeja, Lagos, Nigeria,</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Report #{{ $editData->report_id }}</h3>
                                        <ul class="list-unstyled">
                                            <li>Date: <span>{{ date('d-m-Y',strtotime($editData->created_at)) }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">

                                        <li>
                                            <h5 class="mb-0"><strong>{{ $editData->staff_name }}</strong></h5>
                                        </li>
                                        <li><span>{{ $editData->designation }}</span></li>
                                        <li>Staff ID: {{ $editData->staff_id }}</li>
                                        <li>Joining Date: {{ $editData->doj }}</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 mx-auto">
                                    <div>
                                        <h4 class="m-b-10"><strong>Report</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong></strong> <span >{!! ($editData->report) !!}</span></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
        </form>

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>



@endsection
