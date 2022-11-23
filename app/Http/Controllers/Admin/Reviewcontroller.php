<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class Reviewcontroller extends Controller
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
        $reviews = Review::latest()->simplePaginate(5);
        return view('admin.cusomer_reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cusomer_reviews.create');
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
            'review_name'=>'required',
            'review_occupation'=>'required',
            'review_description'=>'required',
            'review_status'=>'required',
            'review_image'=>'required|mimes:png,jpg,jpeg',

        ]);

        $image=$request->file('review_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);



        Review::create([
            'review_name' => $request->get('review_name'),
            'review_occupation' => $request->get('review_occupation'),
            'review_description'=>$request->get('review_description'),
            'review_status'=>$request->get('review_status'),
            'review_image'=>$name
        ]);


        return redirect()->route('reviews.index')->with([
            'message' => 'Review Created Successfully !',
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
        $review=Review::find($id);
        return view('admin.cusomer_reviews.show',compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review=Review::find($id);
        return view('admin.cusomer_reviews.edit',compact('review'));
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
            'review_name'=>'required',
            'review_occupation'=>'required',
            'review_description'=>'required',
            'review_status'=>'required',
            'review_image'=>'mimes:png,jpg,jpeg'
        ]);

        $review=Review::find($id);
        $review->update($request->all());

        if ($request->exists('review_image'))
        {
        $image=$request->file('review_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $review->review_image = $name;
        $review->save();
        }

        return redirect()->route('reviews.index')->with([
            'message' => 'Review Updated  Successfully !',
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
        $review=Review::find($id);
        $review->delete();
        return redirect()->route('reviews.index')->with([
            'message' => 'Review Deleted Successfully !',
            'alert-type' => 'danger',
            ]);

    }
}
