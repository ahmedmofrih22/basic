@extends('layouts.master');




@section('content')
    
    <h4>Multipic</h4>
    <div class="row">


        <div class="col-md-8">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>


                        <th scope="col">Image</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                ?>
                @foreach ($image as $images)
                    <tbody>
                        <tr>
                            <th scope="row">{{ ++$i }}</th>


                            <td><img src="{{ asset($images->image) }}" alt="" style="width:70px; height:40px; ">
                            </td>
                            <td>
                                @if ($images->created_at == null)
                                    <span class="text-danger"> No Date Set</span>
                                @else
                                    {{ Carbon\Carbon::parse($images->created_at)->diffForHumans() }}
                                @endif
                                {{-- <td>{{ $categorys->created_at }} --}}

                                {{-- <td>{{ Carbon\Carbon::parse($categorys->created_at)->diffForHumans() }} --}}

                            </td>
                            <td><a href="{{ url('Multi/' . $images->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="" onclick="return confirm('Ary you suer to delete')"
                                    class="btn btn-danger">Delete</a></td>

                        </tr>

                    </tbody>
                @endforeach
            </table>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Image

                    <div class="card-body">
                        <form action="{{ url('store_Multi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">


                                Image</label>
                                <input type="file" name="Image[]" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" multiple="">
                                @error('Image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add Iamge</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>





    </div>
    </div>
    </div>
@endsection
