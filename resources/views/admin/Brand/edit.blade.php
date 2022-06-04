@extends('layouts.master');




@section('content')
    <!--=================================
                                                                                         preloader -->
    <div class="col-12 text-center text-primary mt-1 mb-4">
        <h2>
            Update_Brand
        </h2>
    </div>







    <form action="{{ url('update_Brand/' . $brands->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" class="form-control" id="inputEmail4" name="old_image" value="{{$brands->brand_image }}">

                <label for="inputEmail4">Brand_Name</label>
                <input type="text" class="form-control" id="inputEmail4" name="brand_name"
                    value="{{ $brands->brand_name }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Brand_Image</label>
                <input type="file" class="form-control" id="inputEmail4" name="brand_image"
                    >
                <br>
                <img src="{{ asset($brands->brand_image) }}" alt="" style="width:100px; height:100px; ">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@endsection


