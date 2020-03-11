<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Product;
use App\Producer;
use App\Type;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ) {

        if ( Auth::check() ) {

            $product = DB::table( 'product' )
            ->join( 'type', 'type.id', '=', 'product.type' )
            ->join( 'producer', 'producer.id', '=', 'product.producer' )
            ->select( DB::raw( 'product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input' ) )
            ->orderby( 'product.id', 'desc' )
            ->get();
            return view( 'product.index', compact( 'product' ) );
        } else {
            return view( 'admin.404' );
        }
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        $product = DB::table( 'product' )
        ->join( 'type', 'type.id', '=', 'product.type' )
        ->join( 'producer', 'producer.id', '=', 'product.producer' )
        ->select( DB::raw( 'product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input' ) )
        ->orderby( 'product.id', 'desc' )
        ->get();
        $type = Type::all();
        $producer = Producer::all();
        return view( 'product.create', compact( 'type', 'producer' ) );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required',
            'type' => 'required',
            'producer' => 'required',
            'amount' => 'required',
            'image' => 'image | mimes:png,jpg,jpeg',
            'price_input' => 'required'

        ] );
        $product = new Product();
        $product->id = $request->id;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->producer = $request->producer;
        $product->amount = $request->amount;
        $product->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        $product->price_input = $request->price_input;
        $product->save();
        return redirect()->route( 'product.index' )->with( 'success', 'Product Created successfully' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        // $product = Product::find( $id );
        $product = DB::table( 'product' )
        ->join( 'type', 'type.id', '=', 'product.type' )
        ->join( 'producer', 'producer.id', '=', 'product.producer' )
        ->select( DB::raw( 'product.id, product.name, type.name as type, producer.name as producer, product.amount, product.image, product.price_input' ) )
        ->orderby( 'product.id', 'desc' )
        ->get();
        //pass posts data to view and load list view
        return view( 'product.show', ['product' => $product[0]] );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $product = Product::find( $id );
        $type = Type::all();
        $producer = Producer::all();
        return view( 'product.edit', compact( 'product', 'type', 'producer' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {

        $request->validate( [
            'name' => 'required',
            'type' => 'required',
            'producer' => 'required',
            'amount' => 'required',
            'image' => 'image | mimes:png,jpg,jpeg',
            'price_input' => 'required'

        ] );
        $product = Product::findOrfail($id);
        $product->name = $request->name;
        $product->type = $request->type;
        $product->producer = $request->producer;
        $product->amount = $request->amount;
        if($request->hasFile('image')){
        $product->image = base64_encode( file_get_contents( $request->file( 'image' )->getRealPath() ) );
        }
        $product->price_input = $request->price_input;
        $product->save();
        return redirect()->route( 'product.index' )->with( 'success', 'Product Created successfully' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        Product::find( $id )->delete();

        //store status message
        Session::flash( 'success_msg', 'Product deleted successfully!' );

        return redirect()->route( 'product.index' );
    }
}
