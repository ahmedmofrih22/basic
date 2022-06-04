@extends('layouts.master');




@section('content')
   
    <div class="row"><br>
        <div class="col-md-10">
            <h3>Home Slider </h3><br>
            <td><a style="color: #fff" class="btn btn-info" data-toggle="modal"
                    data-target="#exampleModalForm">Add_Slider</a></td>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Title</th>
                        <th scope="col">Short_Description</th>
                        <th scope="col">Long_Description</th>

                        {{-- <th scope="col">CREATED_AT</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                ?>
                @foreach ($About as $Abouts)
                    <tbody>
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td >{{ $Abouts->title }}</td>
                            <td > <textarea readonly>{{ $Abouts->short_dis }}</textarea></td>
                                <td >  <textarea readonly>{{ $Abouts->long_dis }}</textarea></td>

                            <td><a href="{{ url('About_edit/' . $Abouts->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{ url('About_delete/' . $Abouts->id) }}" style="margin-left: -20px;"
                                    onclick="return confirm('Ary you suer to delete')" class="btn btn-danger">Delete</a>
                            </td>


                        </tr>

                    </tbody>
                @endforeach
            </table>
        </div>
        {{-- <div class="col-md-8">
            <div class="card" style="margin-left:150px;">
                <div class="card-header">
                    Add Brand

                    <div class="card-body">
                        <form action="{{ url('user_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">
                                    Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="exampleInputEmail1" class="form-label">
                                    email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="exampleInputEmail1" class="form-label">
                                    password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                Image</label>
                                <input type="file" name="Image" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('Image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>

                </div>
            </div>
        </div> --}}
        <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFormTitle"> Add Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('About_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="exampleInputEmail1" class="form-label">
                                    Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="exampleInputEmail1" class="form-label">
                                    Short_Description</label>
                                <textarea name="short_dis" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                </textarea>
                                @error('short_dis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror



                                <label for="exampleInputEmail1" class="form-label">
                                    Long_Description</label>
                                <textarea  name="long_dis" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                </textarea>
                                @error('long_dis')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-pill">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
