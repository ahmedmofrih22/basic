@extends('layouts.master');




@section('content')
    <form class="row g-3" action="{{ url('store_Category') }}" method="POST">
        @csrf
        <div class="col-auto">
            <label for="staticEmail2" class="visually-hidden">Catgory_Name</label>
            <input type="text" class="form-control-plaintext" name="category_name" id="staticEmail2"
                style="    border: inset;">
        </div>

        <div class="col-auto" style="    margin-top: 30px;">
            <button type="submit" class="btn btn-primary mb-3">Add_Catgory</button>
        </div>
    </form>

    <br>
    <h4>Catgory</h4>
    <div class="row">
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User_Id</th>
                    <th scope="col">Category_Name</th>

                    <th scope="col">CREATED_AT</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $i = 0;
            ?>
            @foreach ($category as $categorys)
                <tbody>
                    <tr>
                        {{-- <th scope="row">{{ ++$i }}</th> --}}
                        <th scope="row">{{ $category->firstItem() + $loop->index }}</th>
                        <td>
                            {{ $categorys->User->name }}
                        </td>
                        <td>{{ $categorys->category_name }}</td>
                        <td>
                            @if ($categorys->created_at == null)
                                <span class="text-danger"> No Date Set</span>
                            @else
                                {{ Carbon\Carbon::parse($categorys->created_at)->diffForHumans() }}
                            @endif
                            {{-- <td>{{ $categorys->created_at }} --}}

                            {{-- <td>{{ Carbon\Carbon::parse($categorys->created_at)->diffForHumans() }} --}}

                        </td>
                        <td><a href="{{ url('edit_Category/' . $categorys->id) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td><a href="{{ url('delete_Category/' . $categorys->id) }}"style="margin-left: -60px;" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>

                </tbody>
            @endforeach
        </table>
        {{ $category->links() }}

    </div>
    <br>
    <h4>onlyCeck</h4>
    <div class="row">
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User_Id</th>
                    <th scope="col">Category_Name</th>

                    <th scope="col">CREATED_AT</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $i = 0;
            ?>
            @foreach ($onlyCeck as $onlyCecks)
                <tbody>
                    <tr>
                        {{-- <th scope="row">{{ ++$i }}</th> --}}
                        <th scope="row">{{ $onlyCeck->firstItem() + $loop->index }}</th>
                        <td>
                            {{ $onlyCecks->User->name }}
                        </td>
                        <td>{{ $onlyCecks->category_name }}</td>
                        <td>
                            @if ($onlyCecks->created_at == null)
                                <span class="text-danger"> No Date Set</span>
                            @else
                                {{ Carbon\Carbon::parse($onlyCecks->created_at)->diffForHumans() }}
                            @endif
                            {{-- <td>{{ $categorys->created_at }} --}}

                            {{-- <td>{{ Carbon\Carbon::parse($categorys->created_at)->diffForHumans() }} --}}

                        </td>
                        <td><a href="{{url('Restore_Category/'.$onlyCecks->id)}}" class="btn btn-info">Restore</a></td>
                        <td><a href="{{url('FDelete_Category/'.$onlyCecks->id)}}" class="btn btn-danger">FDelete</a></td>

                    </tr>

                </tbody>
            @endforeach
        </table>
        {{ $onlyCeck->links() }}

    </div>
@endsection
