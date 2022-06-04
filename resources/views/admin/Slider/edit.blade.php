@extends('layouts.master');




@section('content')

<div class="col-md-10">
    <div class="card" style="margin-left: 100px;">
        <div class="card-header">
          Edit User

            <div class="card-body">
                <form action="{{ url('Slider_update/' . $Slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" id="inputEmail4" name="old_image" value="{{$slider->image }}">

                            <label for="inputEmail4">Title</label>
                            <input type="text" class="form-control" id="inputEmail4" name="title"
                                value="{{ $Slider->title }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Description</label>
                            <input type="text" class="form-control" id="inputPassword4" name="description"
                                value="{{ $slider->description }}">
                        </div>
                    </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Image</label>
                            <input type="file" class="form-control" id="inputPassword4" name="Image"><br>

                                <img src="{{ asset($slider->image) }}" alt="" style="width:100px; height:100px; ">

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
