<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductType;
use App\Provider;
use App\TypeProduit;
use Doctrine\DBAL\Types\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits= Product::all();
        return  view('admin.products.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= ProductType::all();
        $providers= Provider::all();

        return view('admin.products.create',['types'=>$types,'providers'=>$providers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product= new Product();
        $product->libelle=$request->libelle;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->quantityMin=$request->quantityMin;
        $product->price=$request->price;
        $product->product_type_id=$request->type;
        $product->provider_id=$request->provider;
        $product->save();
        return redirect('admin.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Product::find($id);
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $produit= Product::find($id);
       $providers=Provider::all();
       $types= TypeProduit::all();
       return view('admin.products.edit',['provider'=>$providers,'types'=>$types,'produits'=>$produit]);
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
        $product = Product::find($id);
        $product->libelle = $request->libelle;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->quantityMin = $request->quantityMin;
        $product->price = $request->price;
        $product->product_type_id = $request->type;
        $product->provider = $request->provider;
        $product->update();
        return redirect("admin.products");
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
