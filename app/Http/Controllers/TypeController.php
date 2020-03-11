<?php

namespace App\Http\Controllers;

use App\Type;
use http\Env\Response;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $type = Type::all();
                return view('type.index', compact('type'));
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
        return view('type.create');
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
            // 'image' => 'required',
         ]);
         $type = new Type();
         $type->name = $request->name;
            $type->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        $type->save();
         return redirect()->route('type.index')->with('success','Type Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::findOrFail($id);
        return view('type.show',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('type.edit',compact('type'));
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
            // 'image' => 'required',
         ]);
         $type = Type::findOrfail($id);
         $type->name = $request->name;
        $type->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        $type->save();
         return redirect()->route('type.index')->with('success','Type Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::find($id)->delete();

        //store status message
        Session::flash('success_msg', 'Type deleted successfully!');

        return redirect()->route('type.index');
    }
}
