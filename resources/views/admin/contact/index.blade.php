@extends('layouts.master');




@section('content')
  
    <div class="row"><br>
        <div class="col-md-10">
            <td><a class="btn btn-info" style="color: #fff" data-toggle="modal" data-target="#exampleModalForm">Add_User</a></td>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        {{-- <th scope="col">CREATED_AT</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 0;
                ?>
                @foreach ($contact as $contacts)
                    <tbody>
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $contacts->address }}</td>




                            <td>{{ $contacts->email }}</td>
                            <td>{{ $contacts->phone }}</td>

                            <td><a href="{{ url('contact_edit/' . $contacts->id) }}" class="btn btn-info">Edit</a></td>

                            <td><a href="{{ url('contact_delete/' . $contacts->id) }}" style="margin-left: -10px;"
                                onclick="return confirm('Ary you suer to delete')" class="btn btn-danger">Delete</a></td>


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
        <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalFormTitle"> Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('contact_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">

                                <label for="exampleInputEmail1" class="form-label">
                                    Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('address')
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
                                    Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                @error('phone')
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
