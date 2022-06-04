@extends('layouts.master');




@section('content')
  
    <h4>Brand</h4>
    <div class="row">


        <div class="col-md-8">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Brand_Name</th>
                        <th scope="col">Brand_image</th>
                        <th scope="col">CREATED_AT</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                ?>
                @foreach ($Brand as $Brands)
                    <tbody>
                        <tr>
                            {{-- <th scope="row">{{ ++$i }}</th> --}}
                            <th scope="row">{{ $Brand->firstItem() + $loop->index }}</th>
                            <td>
                                {{ $Brands->brand_name }}
                            </td>
                            <td><img src="{{ asset($Brands->brand_image) }}" alt="" style="width:70px; height:40px; ">
                            </td>
                            <td>
                                @if ($Brands->created_at == null)
                                    <span class="text-danger"> No Date Set</span>
                                @else
                                    {{ Carbon\Carbon::parse($Brands->created_at)->diffForHumans() }}
                                @endif
                                {{-- <td>{{ $categorys->created_at }} --}}

                                {{-- <td>{{ Carbon\Carbon::parse($categorys->created_at)->diffForHumans() }} --}}

                            </td>
                            <td><a href="{{ url('edit_Brand/' . $Brands->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{ url('delete_Brand/' . $Brands->id) }}"
                                  onclick="return confirm('Ary you suer to delete')" class="btn btn-danger">Delete</a></td>

                        </tr>

                    </tbody>

                @endforeach
            </table>
            {{ $Brand->links() }}
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Brand

                    <div class="card-body">
                        <form action="{{ url('store_Brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    Brand_Name</label>
                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                Breand_Image</label>
                                <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add Brand</button>
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
