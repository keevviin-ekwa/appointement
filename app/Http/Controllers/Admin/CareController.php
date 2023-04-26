<?php

namespace App\Http\Controllers\Admin;

use App\Care;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cares= Care::all();
        return view('admin.cares.index',compact('cares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('admin.cares.create',['products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $care= new Care();
        $care->name=$request->name;
        $care->description=$request->description;
        $care->time=$request->time;
        $care->cost=$request->cost;
        $care->save();
        $care->products()->sync($request->products);
        return redirect('admin.cares');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $care= Care::find($id);

        return view('admin.cares.show',compact('care'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $care= Care::find($id);

        return view('admin.cares.edit',compact('care'));
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
        $care= Care::find($id);
        $care->name=$request->name;
        $care->description=$request->description;
        $care->time=$request->time;
        $care->cost=$request->cost;
        $care->update();
        $care->products()->sync($request->products);
        return redirect('admin.cares');
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
