<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->simplePaginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_name'=>'required',
            'product_price'=>'required|min:1',
            'product_quantity'=>'required|min:1',
            'product_description'=>'required|max:100',
            'product_status'=>'required',
            'product_image'=>'required|mimes:png,jpg,jpeg|max:10000',
            'category_id'=>'required'

        ]);

        $image=$request->file('product_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);



        Products::create([
            'product_name' => $request->get('product_name'),
            'product_price' => $request->get('product_price'),
            'product_quantity'=>$request->get('product_quantity'),
            'product_description'=>$request->get('product_description'),
            'product_status'=>$request->get('product_status'),
            'category_id'=>$request->get('category_id'),
            'product_image'=>$name
        ]);


        return redirect()->route('products.index')->with([
            'message' => 'Product Created Successfully !',
            'alert-type' => 'success'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Products::find($id);
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
        $product=Products::find($id);
        return view('admin.products.edit', compact('product'));
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
        $this->validate($request,[
            'product_name'=>'required',
            'product_price'=>'required|min:1',
            'product_quantity'=>'required|min:1',
            'product_status'=>'required',
            'product_description'=>'required|max:100',
            'category_id'=>'required',
            'product_image'=>'mimes:png,jpg,jpeg'
        ]);

        $product=Products::find($id);
        $product->update($request->all());

        if ($request->exists('product_image'))
        {
        $image=$request->file('product_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $product->product_image = $name;
        $product->save();
        }

        return redirect()->route('products.index')->with([
            'message' => 'Product Updated  Successfully !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Products::find($id);

        $product->delete();
        return redirect()->route('products.index')->with([
            'message' => 'Product Deleted Successfully !',
            'alert-type' => 'danger',
            ]);
    }
}
