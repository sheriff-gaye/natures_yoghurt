<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class Categorycontroller extends Controller
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
        $categories = Category::withCount('parent')->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name'=>'required',
            'cover'=>'required|mimes:png,jpg,jpeg',

        ]);

        $image=$request->file('cover');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);



        Category::create([
            'category_name' => $request->get('category_name'),
            'cover' => $name,
        ]);


        return redirect()->route('category.index')->with([
            'message' => 'Category Created Successfully !',
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
        // abort_if(Gate::denies('category_view'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category=Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit', compact('category'));
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
            'category_name'=>'required',
            'cover'=>'mimes:png,jpg,jpeg'
        ]);

        $category=Category::find($id);
        $category->update($request->all());

        if ($request->exists('cover'))
        {
        $image=$request->file('cover');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $category->cover = $name;
        $category->save();
        }

        return redirect()->route('category.index')->with([
            'message' => 'Category Updated Successfully !',
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
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with([
            'message' => 'Category Deleted  Successfully !',
            'alert-type' => 'danger',
            ]);
    }
}
