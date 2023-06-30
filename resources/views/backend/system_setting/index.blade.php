@extends('admin.admin_master')
@section('title', 'System Setting')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <div class="col-md-7 mx-auto">
        <div class="card">

            <div class="card-body">
                <form method="post" action="{{ route('systemsettings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Name<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_name" value="{{ $editData->system_name }}"
                                    type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Title<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_title" value="{{ $editData->system_title }}"
                                    type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Address<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_address"
                                    value="{{ $editData->system_address }}" type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Email<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_email" value="{{ $editData->system_email }}"
                                    type="email" required>
                                <small class="form-control-feedback">
                                    @error('system_email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Footer<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_footer" value="{{ $editData->system_footer }}"
                                    type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_footer')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Description<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="system_description"
                                    value="{{ $editData->system_description }}" type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Keywords<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_keywords"
                                    value="{{ $editData->system_keywords }}" type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">System Author<span class="text-danger">*</span></label>
                                <input class="form-control" name="system_author" value="{{ $editData->system_author }}"
                                    type="text" required>
                                <small class="form-control-feedback">
                                    @error('system_author')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">System Logo<span class="text-danger">*</span></label>
                                <input type="file" name="system_logo" class="form-control" id="image" />
                                <small class="form-control-feedback">
                                    @error('system_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
                                    style="width:100px; height: 100px;" />
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">System Favion<span class="text-danger">*</span></label>
                                <input type="file" name="system_favion" class="form-control" id="images" />
                                <small class="form-control-feedback">
                                    @error('system_favion')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <img id="showImages" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
                                    style="width:100px; height: 100px;" />
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#images').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImages').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
