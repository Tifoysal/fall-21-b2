@extends('admin.master')


@section('content')

{{--Message section in blade file--}}

    @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif


<h1>Category list</h1>
<a href="{{route('category.form')}}" class="btn btn-success">Create new category</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">category name</th>
        <th scope="col">Details</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key=>$category)
           <tr>
                <th>{{$key+1}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->details}}</td>
            </tr> 
        @endforeach
    
    
    </tbody>
</table>
@endsection
