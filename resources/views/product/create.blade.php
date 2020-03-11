@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
        <div class="pull-left">
            <h2>Create Product</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('product.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" >
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
            <div class="form-group{{$errors->has('type')?' has-error':''}}">
                <strong>Type :</strong>
                {{-- <textarea name="type" id="type" rows="10" placeholder="type" class="form-control"></textarea>
                 --}}
                 <select class="form-control input-width" name="type">
                    @foreach($type as $types)
                        <option value="{{ $types->id }}">{{ $types->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{$errors->first('type')}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{$errors->has('producer')?' has-error':''}}">
                <strong>Producer :</strong>
                {{-- <textarea name="producer" id="producer" rows="10" placeholder="producer"
                    class="form-control"></textarea> --}}
                    <select class="form-control input-width" name="producer">
                        @foreach($producer as $producers)
                            <option value="{{ $producers->id }}">{{ $producers->name }}</option>
                        @endforeach
                    </select>
                <span class="text-danger">{{$errors->first('producer')}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{$errors->has('amount')?' has-error':''}}">
                <strong>amount :</strong>
                <textarea name="amount" id="amount" rows="10" placeholder="amount" class="form-control"></textarea>
                <span class="text-danger">{{$errors->first('amount')}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image :</strong>
                <input type="file" class="form-control" name="image" id="image">
                {{--  <span class="text-danger">{{$errors->first('image')}}</span>  --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group{{$errors->has('price_input')?' has-error':''}}">
                <strong>Price_input :</strong>
                <textarea name="price_input" id="price_input" rows="10" placeholder="price_input"
                    class="form-control"></textarea>
                <span class="text-danger">{{$errors->first('price_input')}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Add New</button>
        </div>
    </div>
</form>
@endsection
