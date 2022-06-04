@extends('layouts.master');




@section('content')
    <!--=================================
                     preloader -->
    <br><br>

    <div class="container">
        <br>


        <form action="{{ url('update_Category/' . $catogery->id) }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Category_Name</label>
                    <input type="text" class="form-control" id="inputEmail4" name="category_name"
                        value="{{ $catogery->category_name }}">
                </div>
                {{-- <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div> --}}
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>


    </div>
    </div>
@endsection

