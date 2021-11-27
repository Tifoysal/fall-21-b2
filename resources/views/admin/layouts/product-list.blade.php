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


<h1>Product list</h1>
<a href="{{route('admin.products.create')}}" class="btn btn-success">Create new product</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th>Image</th>
        <th scope="col">description</th>
        <th scope="col">category</th>
        <th scope="col">price</th>
        <th scope="col">status</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($products as $key=>$product)
            <tr>
                <th>{{$key+1}}</th>
                <td>{{$product->name}}</td>
                <td>
                    <img src="{{url('/uploads/'.$product->image)}}" width="100px" alt="product image">
                </td>
                <td>{{$product->description}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->status}}</td>
            </tr>
        @endforeach
   
    </tbody>
</table>
@endsection
