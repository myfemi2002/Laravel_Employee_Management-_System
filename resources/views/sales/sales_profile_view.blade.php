@extends('sales.sales_master')
@section('title', 'Profile')
@section('sales')


<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('sales.dashobard') }}">Dashboard</a></li>
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
                            <a href="#"><img alt="{{ $adminData->name }}" src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}"></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0">{{ $adminData->name }}</h3>
                                    <h6 class="text-muted">{{ $adminData->designations }}</h6>

                                    <div class="small doj text-muted">Date of Join :
                                        @if($adminData->doj == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        {{ $adminData->doj }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <div class="title">Phone:</div>
                                        @if($adminData->phone == NULL)
                                        <span class="text-danger">Not Set</span>
                                        @else
                                        <div class="text"><a href="tel:{{ $adminData->phone }}">{{ $adminData->phone }}</a></div>
                                        @endif
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        @if($adminData->email == NULL)
                                            <span class="text-danger">Not Set</span>
                                            @else
                                            <div class="text"><a href="mailto:{{ $adminData->email }}">{{ $adminData->email }}</a></div>
                                            @endif
                                    </li>
                                    <li>
                                        <div class="title">Birthday:</div>
                                            @if($adminData->dob == NULL)
                                            <span class="text-danger">Not Set</span>
                                            @else
                                            <div class="text">{{ $adminData->dob}}</div>
                                            @endif
                                        </li>
                                    <li>
                                        <div class="title">Address:</div>
                                        @if($adminData->address == NULL)
                                            <span class="text-danger">Not Set</span>
                                            @else
                                            <div class="text">{{ $adminData->address }}</div>
                                            @endif
                                    </li>
                                    <li>
                                        <div class="title">Gender:</div>
                                        @if($adminData->gender == NULL)
                                            <span class="text-danger">Not Set</span>
                                            @else
                                            <div class="text">{{ $adminData->gender }}</div>
                                            @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
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
                <form id="profileInformation" class="form" method="POST" action="{{ route('sales.profileinformation.store') }}" enctype="multipart/form-data">@csrf

                    <div class="row">
                        <div class="col-md-12">

                            <div class="profile-img-wrap edit-img">
                                <img  id="showImage" class="inline-block" src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="user">

                                <div class="fileupload btn">
                                    <span class="btn-text">edit</span>
                                    <input class="upload" type="file" name="photo"  id="image">
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
                                        <input type="text" class="form-control" value="{{ $adminData->name }}" readonly>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" value="{{ $adminData->phone }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $adminData->email }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="{{ $adminData->username }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" name="dob" type="text" value="{{ date("dd/mm/YYYY",strtotime($adminData->dob ));}}">
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
                                            <option value="Male" {{ ($adminData->gender == "Male" ? "selected": "") }}>Male</option>
                                            <option value="Female" {{ ($adminData->gender == "Female" ? "selected": "") }}>Female</option>
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
                                <input type="text" class="form-control" name="address" value="{{ $adminData->address }}">
                                <small class="form-control-feedback">
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" >Submit</button>
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
