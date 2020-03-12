<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Producer;
use Session;


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
            return view('producer.index', compact('producer'));
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
            // 'image' => 'required',
        ]);
        $producer = new Producer();
        $producer->name = $request->name;
        $producer->address = $request->address;
        $producer->phone = $request->phone;
        $producer->tax_code = $request->tax_code;
        $producer->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        $producer->save();
        return redirect()->route('producer.index')->with('success', 'Producer Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producer = Producer::findOrFail($id);
        return view('producer.show', compact('producer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producer = Producer::find($id);
        return view('producer.edit', compact('producer'));
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
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'tax_code' => 'required',
        ]);
        $producer = Producer::findOrfail($id);
        $producer->name = $request->name;
        $producer->address = $request->address;
        $producer->phone = $request->phone;
        $producer->tax_code = $request->tax_code;
        if ($request->hasFile('image')) {
            $producer->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }
        $producer->save();
        return redirect()->route('producer.index')->with('success', 'Producer Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producer::find($id)->delete();

        //store status message
        Session::flash('success_msg', 'Type deleted successfully!');

        return redirect()->route('producer.index');
    }
}