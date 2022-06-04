@extends('layouts.master');




@section('content')

<div class="col-md-10">
    <div class="card" style="margin-left: 100px;">
        <div class="card-header">
          Edit User

            <div class="card-body">
                <form action="{{ url('About_update/' . $About->id) }}" method="POST" >
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label for="inputEmail4">Title</label>
                            <input type="text" class="form-control" id="inputEmail4" name="title"
                                value="{{ $About->title }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1" class="form-label">
                                Short_Description</label>
                            <textarea  name="short_dis" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                                {{ $About->short_dis }}
                            </textarea>
                        </div>
                    </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1" class="form-label">
                                Long_Description</label>
                            <textarea  name="long_dis" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp"  >
                                {{ $About->long_dis }}
                            </textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
