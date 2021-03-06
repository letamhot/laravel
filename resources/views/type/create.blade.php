@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-left">
            <h2>Create type</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('type.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
<form action="{{route('type.store')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="name">
                <span class="text-danger">{{$errors->first('name')}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image :</strong>
                <input type="file" class="form-control" name="image" id="image">
                {{-- <span class="text-danger">{{$errors->first('image')}}</span> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Add New</button>
        </div>
    </div>
</form>
@endsection
