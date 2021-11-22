@extends('admin.master')


@section('content')

    <h1>Create a category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('category.add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter Category Name</label>
            <input required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter Category Description</label>
            <textarea required type="text" name="details" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
