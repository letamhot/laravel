@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="pull-right">
                <a href="{{url('home')}}" class="btn btn-primary">Back</a>
            </div>
            <br />
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">

            <div class="pull-left">
                <h2>Quản lý tài khoản</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('product.create')}}" class="btn btn-success">Create New Product</a>
            </div>
        </div>
    </div>
    @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Producer</th>
                <th>Amount</th>
                <th>Image</th>
                <th>Price_input</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $value)

                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->producer}}</td>
                    <td>{{$value->amount}}</td>
                    <td><img src="{{'data:image;base64,'.base64_encode($value->image)}}" width="60px" height="60px"></td>
                    <td>{{$value->price_input}}</td>
                    <td>
                         <a href="{{ route('product.show', $value->id) }}" class="label label-success">Show</a>
                                <a href="{{ route('product.edit', $value->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('product.destroy', $value->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>


                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
