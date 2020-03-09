@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Sửa tài khoản</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{route('post.update',$post->id)}}" method="post" role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('name')?' has-error':''}}">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" placeholder="name">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('email')?' has-error':''}}">
                    <strong>Email:</strong>
                    <textarea class="form-control" rows="10" name="email" placeholder="email">{{ $post->email }}</textarea>
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('password')?' has-error':''}}">
                    <strong>Password:</strong>
                    <textarea class="form-control" rows="10" name="password" placeholder="password">{{ $post->password }}</textarea>
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('remember_token')?' has-error':''}}">
                    <strong>Remember_token:</strong>
                    <textarea class="form-control" rows="10" name="remember_token" placeholder="remember_token">{{ $post->remember_token }}</textarea>
                    <span class="text-danger">{{$errors->first('remember_token')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection