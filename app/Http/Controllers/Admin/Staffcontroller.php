<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class Staffcontroller extends Controller
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
        $staffs=Staff::latest()->simplePaginate(5);
        return view('admin.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
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
            'staff_name'=>'required',
            'staff_occupation'=>'required',
            'staff_status'=>'required',
            'staff_image'=>'required|mimes:png,jpg,jpeg',

        ]);

        $image=$request->file('staff_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);



        Staff::create([
            'staff_name' => $request->get('staff_name'),
            'staff_occupation' => $request->get('staff_occupation'),
            'staff_instagram'=>$request->get('staff_instagram'),
            'staff_twitter'=>$request->get('staff_twitter'),
            'staff_linkedin'=>$request->get('staff_linkedin'),
            'staff_status'=>$request->get('staff_status'),
            'staff_image'=>$name
        ]);


        return redirect()->route('staff.index')->with([
            'message' => 'Staff Profile Created Successfully !',
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
        $staff=Staff::find($id);
        return view('admin.staff.show',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff=Staff::find($id);
        return view('admin.staff.edit',compact('staff'));
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
            'staff_name'=>'required',
            'staff_occupation'=>'required',
            'staff_status'=>'required',
            'staff_image'=>'mimes:png,jpg,jpeg'
        ]);

        $staff=Staff::find($id);
        $staff->update($request->all());

        if ($request->exists('staff_image'))
        {
        $image=$request->file('staff_image');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $staff->staff_image = $name;
        $staff->save();
        }

        return redirect()->route('staff.index')->with([
            'message' => 'Staff Profile Updated  Successfully !',
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
        $staff=Staff::find($id);
        $staff->delete();
        return redirect()->route('staff.index')->with([
            'message' => 'Staff Profile Deleted Successfully !',
            'alert-type' => 'danger',
            ]);
    }
}
