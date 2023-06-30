@extends('admin.admin_master')
@section('title', 'Edit Client')
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
    <div class="col-md-9 mx-auto">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('clients.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Client Id</label>
                                <input class="form-control" type="text"  value="{{ $editData->client_id }}" readonly>
                                <small class="form-control-feedback">
                                @error('client_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Date</label>
                                <input class="form-control" type="text" value="{{ $editData->date }}" readonly>
                                <small class="form-control-feedback">
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Contact Person</label>
                                <input class="form-control" type="text"  value="{{ $editData->staff_name }}" readonly>
                                <small class="form-control-feedback">
                                @error('staff_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Clients Phone<span class="text-danger">*</span></label>
                                <input class="form-control" type="tel" value="{{ $editData->phone }}" readonly>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Clients Email<span class="text-danger">*</span></label>
                                <input class="form-control" type="email" value="{{ $editData->email }}" readonly>
                                <small class="form-control-feedback">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Clients Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name"  value="{{ $editData->name }}" required>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Clients Gender<span class="text-danger">*</span></label>
                                <select class="select" name="gender" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="1" {{ ($editData->gender == "1" ? "selected": "") }}>Male</option>
                                    <option value="2" {{ ($editData->gender == "2" ? "selected": "") }}>Female</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Payment Status<span class="text-danger">*</span></label>
                                <select class="select" name="payment_status" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="1" {{ ($editData->payment_status == "1" ? "selected": "") }}>Paid</option>
                                    <option value="2" {{ ($editData->payment_status == "2" ? "selected": "") }}>Partially Paid</option>
                                    <option value="0" {{ ($editData->payment_status == "0" ? "selected": "") }}>Unpaid</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('payment_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Remark <span class="text-danger">( Optional)</span></label>
                                <textarea class="form-control" rows="4" name="remark" >{{ $editData->remark }}</textarea>
                                <small class="form-control-feedback">
                                @error('remark')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
