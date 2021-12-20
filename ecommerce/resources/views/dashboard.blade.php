@extends('frontend.main_master')
@section('content')

    <div class="body-content ">
        <div class="container ">
            <div class="row">
                <div class="col-md-2">
                    <img class="card-img-top" height="100%" width="100%"  src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/admin_images/no_image.jpg') }}" alt="">

                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>


                    </ul>
                </div> {{-- end  col-md-2 --}}

                <div class="col-md-2">

                </div> {{-- end  col-md-2 --}}

                <div class="col-md-">

                </div> {{-- end  col-md-2 --}}

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger"><strong>{{ Auth::user()->name }}</strong>Welcome To E-shop</span></h3>
                    </div>

                </div> {{-- end  col-md-2 --}}


            </div> {{-- end  row --}}


        </div>
    </div>

@endsection
