@extends('frontend.main_master')
@section('content')

{{-- @php
 $user = DB::table('users')->where('id',Auth::user()->id)->first();   
@endphp --}}

    <div class="body-content ">
        <br>
        <div class="container ">
            <div class="row">
                <div class="col-md-2">
                    <img class="img-fluid" height="100%" width="100%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/user_images/no_image.jpg') }}"
                        alt="">
                    
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change
                            Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div> {{-- end  col-md-2 --}}

                <div class="col-md-2">

                </div> {{-- end  col-md-2 --}}

                <div class="col-md-">

                </div> {{-- end  col-md-2 --}}

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger"></strong>Change Your Password</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Current Password
                                    <span>*</span></label>
                                <input type="password" id="current_password" name="oldpassword"
                                    class="form-control unicase-form-control text-input">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">New Password <span>*</span></label>
                                <input type="password"  id="pasword" name="password" class="form-control unicase-form-control text-input"
                                     >
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input"
                                    id="password_confirmation">
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Password</button>

                        </form>
                    </div>

                </div> {{-- end  col-md-2 --}}


            </div> {{-- end  row --}}


        </div>
    </div>

@endsection
