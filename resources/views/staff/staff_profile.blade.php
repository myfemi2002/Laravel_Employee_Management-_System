@extends('staff.staff_master')
@section('title', 'Staff Profile')
@section('staff')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('staff.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>

<div class="card mb-0">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img alt="{{ $staffData->name }}"
                                    src="{{ (!empty($staffData->photo)) ? url('upload/staff_images/'.$staffData->photo):url('upload/no_image.jpg') }}"></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{ $staffData->name }}</h3>
                                    <h6 class="text-muted">{{ $staffData->designations }}</h6>

                                    <div class="small doj text-muted">Date of Join :
                                        @if($staffData->doj == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        {{ $staffData->doj }}
                                        @endif
                                    </div>

                                    @if($staffData->staff_type == NULL)
                                    <span class="text-danger">Not Set</span>
                                    @elseif($staffData->staff_type == 'regular')
                                    <div class="small text-info">Regular Staff</div>
                                    @elseif($staffData->staff_type == 'independent')
                                    <div class="small text-info">Independent Staff</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Phone:</div>
                                        @if($staffData->phone == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        <div class="text"><a href="tel:{{ $staffData->phone }}">{{ $staffData->phone
                                                }}</a></div>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        @if($staffData->email == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        <div class="text"><a href="mailto:{{ $staffData->email }}">{{ $staffData->email
                                                }}</a></div>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="title">Birthday:</div>
                                        @if($staffData->dob == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        <div class="text">{{ $staffData->dob}}</div>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="title">Address:</div>
                                        @if($staffData->address == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        <div class="text">{{ $staffData->address }}</div>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="title">Gender:</div>
                                        @if($staffData->gender == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        <div class="text">{{ $staffData->gender }}</div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon"
                            href="#"><i class="fa fa-pencil"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="tab-content">
    <div id="emp_profile" class="pro-overview tab-pane fade show active">
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Personal Informations <a href="#" class="edit-icon"
                                data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i
                                    class="fa fa-pencil"></i></a></h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Nationality</div>
                                @if($staffData->nationality == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->nationality }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Country</div>
                                @if($staffData->country == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->country }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">State</div>
                                @if($staffData->state == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->state }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Tel</div>
                                @if($staffData->phone == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text"><a href="tel:{{ $staffData->phone }}">{{ $staffData->phone }}</a>
                                </div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Religion</div>
                                @if($staffData->religion == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->religion }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Marital status</div>
                                @if($staffData->marital_status == NULL)
                                <span class="text-danger">Not Set</span>
                                @elseif($staffData->marital_status == '1')
                                <div class="text">Single</div>
                                @elseif($staffData->marital_status == '2')
                                <div class="text">Married</div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-bs-toggle="modal"
                                data-bs-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                        <h5 class="section-title">Primary</h5>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Name</div>
                                @if($staffData->pemer_con_name == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->pemer_con_name }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Relationship</div>
                                @if($staffData->pemer_con_relationship == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->pemer_con_relationship }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Phone </div>
                                @if($staffData->pemer_con_phone == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->pemer_con_phone }}</div>
                                @endif
                            </li>
                        </ul>
                        <hr>
                        <h5 class="section-title">Secondary</h5>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Name</div>
                                @if($staffData->semer_con_name == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->semer_con_name }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Relationship</div>
                                @if($staffData->semer_con_relationship == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->semer_con_relationship }}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Phone </div>
                                @if($staffData->semer_con_phone == NULL)
                                <span class="text-danger">Not Set</span>
                                @else
                                <div class="text">{{ $staffData->semer_con_phone }}</div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<div id="profile_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileInformation" class="form" method="POST"
                    action="{{ route('staff.profileinformation.store') }}" enctype="multipart/form-data">@csrf

                    <div class="row">
                        <div class="col-md-12">

                            <div class="profile-img-wrap edit-img">
                                <img id="showImage" class="inline-block"
                                    src="{{ (!empty($staffData->photo)) ? url('upload/staff_images/'.$staffData->photo):url('upload/no_image.jpg') }}"
                                    alt="user">

                                <div class="fileupload btn">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" type="file" name="photo" id="image">
                                    <small class="form-control-feedback">
                                        @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{ $staffData->name }}" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" value="{{ $staffData->phone }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $staffData->email }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="{{ $staffData->username }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" name="dob" type="text"
                                                value="{{ date(" dd/mm/YYYY",strtotime($staffData->dob ));}}">
                                            <small class="form-control-feedback">
                                                @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="select" name="gender" required>
                                            <option value="" selected="" disabled="">-- Select --</option>
                                            <option value="Male" {{ ($staffData->gender == "Male" ? "selected": "")
                                                }}>Male</option>
                                            <option value="Female" {{ ($staffData->gender == "Female" ? "selected": "")
                                                }}>Female</option>
                                        </select>
                                        <small class="form-control-feedback">
                                            @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ $staffData->address }}">
                                <small class="form-control-feedback">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Personal Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="personalInfo" class="form" method="POST"
                    action="{{ route('staff.personalinformation.store') }}">@csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nationality <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nationality"
                                    value="{{ $staffData->nationality }}">
                                <small class="form-control-feedback">
                                    @error('nationality')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="country"
                                    value="{{ $staffData->country }}">
                                <small class="form-control-feedback">
                                    @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="state" value="{{ $staffData->state }}">
                                <small class="form-control-feedback">
                                    @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tel <span class="text-danger">*</span></label>
                                <input class="form-control" type="tel" name="phone" value="{{ $staffData->phone }}">
                                <small class="form-control-feedback">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Religion <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="religion"
                                    value="{{ $staffData->religion }}">
                                <small class="form-control-feedback">
                                    @error('religion')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital status <span class="text-danger">*</span></label>
                                <select class="select form-control" name="marital_status">
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="Single" {{ ($staffData->marital_status == "Single" ? "selected": "")
                                        }}>Single</option>
                                    <option value="Married" {{ ($staffData->marital_status == "Married" ? "selected":
                                        "") }}>Married</option>
                                </select>
                                <small class="form-control-feedback">
                                    @error('marital_status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Personal Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="emergencyContact" class="form" method="POST"
                    action="{{ route('staff.emergencycontact.store') }}">@csrf
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Primary Contact</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pemer_con_name"
                                            value="{{ $staffData->pemer_con_name }}">
                                        <small class="form-control-feedback">
                                            @error('pemer_con_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Relationship <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="pemer_con_relationship"
                                            value="{{ $staffData->pemer_con_relationship }}">
                                        <small class="form-control-feedback">
                                            @error('pemer_con_relationship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="pemer_con_phone"
                                            value="{{ $staffData->pemer_con_phone }}">
                                        <small class="form-control-feedback">
                                            @error('pemer_con_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Secondary Contact</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="semer_con_name"
                                            value="{{ $staffData->semer_con_name }}">
                                        <small class="form-control-feedback">
                                            @error('semer_con_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Relationship <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="semer_con_relationship"
                                            value="{{ $staffData->semer_con_relationship }}">
                                        <small class="form-control-feedback">
                                            @error('semer_con_relationship')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="semer_con_phone"
                                            value="{{ $staffData->semer_con_phone }}">
                                        <small class="form-control-feedback">
                                            @error('semer_con_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div id="experience_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Experience Informations</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-scroll">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                        class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating"
                                                value="Digital Devlopment Inc">
                                            <label class="focus-label">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating" value="United States">
                                            <label class="focus-label">Location</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating" value="Web Developer">
                                            <label class="focus-label">Job Position</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="01/07/2007">
                                            </div>
                                            <label class="focus-label">Period From</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="08/06/2018">
                                            </div>
                                            <label class="focus-label">Period To</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Experience Informations <a href="javascript:void(0);"
                                        class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating"
                                                value="Digital Devlopment Inc">
                                            <label class="focus-label">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating" value="United States">
                                            <label class="focus-label">Location</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <input type="text" class="form-control floating" value="Web Developer">
                                            <label class="focus-label">Job Position</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="01/07/2007">
                                            </div>
                                            <label class="focus-label">Period From</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <div class="cal-icon">
                                                <input type="text" class="form-control floating datetimepicker"
                                                    value="08/06/2018">
                                            </div>
                                            <label class="focus-label">Period To</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-more">
                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
    	$('#image').change(function(e){
    		var reader = new FileReader();
    		reader.onload = function(e){
    			$('#showImage').attr('src',e.target.result);
    		}
    		reader.readAsDataURL(e.target.files['0']);
    	});
    });
</script>

@endsection
