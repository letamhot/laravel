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
                <a href="{{route('post.create')}}" class="btn btn-success">Create New post</a>
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
                <th>Email</th>
                <th>Password</th>
                <th>Remember_token</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post as $value)

                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->password}}</td>
                    <td>{{$value->remember_token}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td>
                         <a href="{{ route('post.show', $value->id) }}" class="label label-success">Show</a>
                                <a href="{{ route('post.edit', $value->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('post.destroy', $value->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>


                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
