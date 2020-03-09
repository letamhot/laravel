@extends('layouts.app')
@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Thêm tài khoản</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <form action="{{route('post.store')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('name')?' has-error':''}}">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('email')?' has-error':''}}">
                    <strong>Email :</strong>
                    <textarea name="email" id="email"  rows="10" placeholder="email" class="form-control"></textarea>
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('password')?' has-error':''}}">
                    <strong>Password :</strong>
                    <textarea name="password" id="password"  rows="10" placeholder="password" class="form-control"></textarea>
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('remember_token')?' has-error':''}}">
                    <strong>Remember_Token :</strong>
                    <textarea name="remember_token" id="remember_token"  rows="10" placeholder="remember_token" class="form-control"></textarea>
                    <span class="text-danger">{{$errors->first('remember_token')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Add New</button>
            </div>
        </div>
    </form>
@endsection