<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::latest()->simplePaginate(5);
        return view('admin.Blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Blog.create');
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
            'blog_title'=>'required',
            'blog_description'=>'required',
            'blog_status'=>'required',
            'blog_image'=>'required|mimes:png,jpg,jpeg',

        ]);

        $image=$request->file('blog_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);



        Blog::create([
            'blog_title' => $request->get('blog_title'),
            'blog_description'=>$request->get('blog_description'),
            'blog_status'=>$request->get('blog_status'),
            'blog_image'=>$name
        ]);


        return redirect()->route('blog.index')->with([
            'message' => 'Post Created Successfully !',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::find($id);
        return view('admin.Blog.edit',compact('blog'));
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
            'blog_title'=>'required',
            'blog_description'=>'required',
            'blog_status'=>'required',
            'blog_image'=>'mimes:png,jpg,jpeg',

        ]);
        $blog=Blog::find($id);
        $blog->update($request->all());

        if ($request->exists('blog_image'))
        {
        $image=$request->file('blog_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $blog->blog_image = $name;
        $blog->save();
        }

        return redirect()->route('blog.index')->with([
            'message' => 'Post Updated  Successfully !',
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
        $blog=Blog::find($id);
        $blog->delete();

        return redirect()->route('blog.index')->with([
            'message' => 'Post Deleted Successfully !',
            'alert-type' => 'danger',
            ]);
    }
}
