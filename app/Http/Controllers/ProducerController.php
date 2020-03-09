<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
        $producer = producer::all();
            return view('producer.index', compact('product'));
        } else {
            return view('admin.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'tax_code' => 'required',
            'image' => 'required',
         ]);
         $id = $request->id;
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $tax_code = $request->tax_code;
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $data = array('id' => $id, "name" => $name, "address" => $address, "phone" => $phone, "tax_code" => $tax_code, "image" => $image);
        DB::table('producer')->insert($data);
         Product::create($request->all());
         return redirect()->route('producer.index')->with('success','Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producer=Producer::findOrFail($id);
        return view('producer.show',compact('producer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producer = producer::findOrFail($id);
        return view('producer.edit',compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
