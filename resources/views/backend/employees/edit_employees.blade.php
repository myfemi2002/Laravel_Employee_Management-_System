@extends('admin.admin_master')
@section('title', 'Edit Staff')
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
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('employees.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Name</label>
                                <input class="form-control" name="name" value="{{ $editData->name }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Phone</label>
                                <input class="form-control" name="phone" value="{{ $editData->phone }}" type="tel" required>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Date Of Birth <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="dob"  value="{{ date("dd/mm/YYYY",strtotime($editData->dob ));}}" type="text" >
                                    <small class="form-control-feedback">
                                    @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Nationality</label>
                                <input class="form-control" name="nationality" value="{{ $editData->nationality }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('nationality')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Religion</label>
                                <input class="form-control" name="religion" value="{{ $editData->religion }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('religion')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">Marital Status</label>
                                <select class="select" name="marital_status" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="Single" {{ ($editData->marital_status == "Single" ? "selected": "") }}>Single</option>
                                    <option value="Married" {{ ($editData->marital_status == "Married" ? "selected": "") }}>Married</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('marital_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">Gender</label>
                                <select class="select" name="gender" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="Male" {{ ($editData->gender == "Male" ? "selected": "") }}>Male</option>
                                    <option value="Female" {{ ($editData->gender == "Female" ? "selected": "") }}>Female</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Country</label>
                                <input class="form-control" name="country" value="{{ $editData->country }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">State</label>
                                <input class="form-control" name="state" value="{{ $editData->state }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('state')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <h4 class="text-danger my-4">Primary Contact Information</h4>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Primary Contact Name</label>
                                <input class="form-control" name="pemer_con_name" value="{{ $editData->pemer_con_name }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('pemer_con_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Primary Contact Relationship</label>
                                <input class="form-control" name="pemer_con_relationship" value="{{ $editData->pemer_con_relationship }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('pemer_con_relationship')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Primary Contact Phone</label>
                                <input class="form-control" name="pemer_con_phone" value="{{ $editData->pemer_con_phone }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('pemer_con_phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <h4 class="text-danger my-4">Secondary Contact Information</h4>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Secondary Contact Name</label>
                                <input class="form-control" name="semer_con_name" value="{{ $editData->semer_con_name }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('semer_con_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Secondary Contact Relationship</label>
                                <input class="form-control" name="semer_con_relationship" value="{{ $editData->semer_con_relationship }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('semer_con_relationship')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Secondary Contact Phone</label>
                                <input class="form-control" name="semer_con_phone" value="{{ $editData->semer_con_phone }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('semer_con_phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
