@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="pull-right">
                <a href="{{url('home')}}" class="btn btn-primary">Back</a>
            </div>
            <br />
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">

            <div class="pull-left">
                <h2>List Producer</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('producer.create')}}" class="btn btn-success">Create New Producer</a>
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
                <th>Address</th>
                <th>Phone</th>
                <th>Tax_code</th>
                <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($producer as $value)

                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->tax_code}}</td>
                    <td><img src="data:image;base64, {{ $value->image }}" width="60px" height="60px"></td>
                    <td><a href="{{ route('producer.show', $value->id) }}" class="btn btn-primary">Show</a></td>
                    <td><a href="{{ route('producer.edit', $value->id) }}" class="btn btn-warning">Edit</a></td>
                <td><form action="{{ route('producer.destroy', $value->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                </td>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
