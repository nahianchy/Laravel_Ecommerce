@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"> Admin Profile Edit </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form method='post' action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Admin User Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" required=""
                                            value="{{ $editData->name }}"
                                            data-validation-required-message="This field is required">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Admin Email<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" required=""
                                            value="{{ $editData->email }}"
                                            data-validation-required-message="This field is required">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="profile_photo_path" id="image" class="form-control"
                                            required="">
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <img id="showImage"
                                    src="{{ !empty($adminData->profile_photo_path) ?? url('upload/admin_images/.$adminData->profile_photo_path') :: url('upload/admin_images/no_image.jpg') }}"
                                    style="width: 100px;" alt="">
                            </div>

                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
