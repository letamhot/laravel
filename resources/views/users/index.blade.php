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
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $value)

            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->created_at}}</td>
                <td>{{$value->updated_at}}</td>
                <td><a href="{{ route('users.show', $value->id) }}" class="btn btn-success">Show</a></td>
                <td><a href="{{ route('users.edit', $value->id) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('users.destroy', $value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"
                            onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
