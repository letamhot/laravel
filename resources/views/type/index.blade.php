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
                <a href="{{route('type.create')}}" class="btn btn-success">Create New type</a>
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
                <th>Image</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($type as $value)

                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td><img src="data:image;base64, {{ $value->image }}" width="60px" height="60px"></td>
                    <td>
                         <a href="{{ route('type.show', $value->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('type.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('type.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
