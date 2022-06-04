@extends('layouts.master');







@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2><span>Hi:</span>{{ $user->name }}</h2>

                </div>
                <div class="card-header card-header-border-bottom" style="margin-left: 42%;">

                      <img style="border-radius: 44px;width: 70px;
                                        " src="{{ asset($user->image) }}" class="user-image" alt="User Image" />


                </div>
                <div class="card-body">
                    <form action="{{ url('user_update/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" id="inputEmail4" name="old_image" value="{{$user->image }}">

                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4"
                                    value="{{ $user->password }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="text" class="form-control" id="inputEmail4" name="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Image</label>
                                <input type="file" class="form-control" id="inputPassword4" name="Image"><br>


                                    <img src="{{ asset($user->image) }}" alt="" style="width:100px; height:100px; ">

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>



    </div>
@endsection
