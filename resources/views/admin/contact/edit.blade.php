@extends('layouts.master');




@section('content')

<div class="col-md-10">
    <div class="card" style="margin-left: 100px;">
        <div class="card-header">
          Edit Contact

            <div class="card-body">
                <form action="{{ url('contact_update/' . $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <label for="inputEmail4">Address</label>
                            <input type="text" class="form-control" id="inputEmail4" name="address"
                                value="{{ $contact->address }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone</label>
                            <input type="text" class="form-control" id="inputPassword4" name="phone"
                                value="{{ $contact->phone }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="text" class="form-control" id="inputEmail4" name="email"
                                value="{{ $contact->email }}">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
