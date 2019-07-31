<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;

class imagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = image::all();
        return view('image.list',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('image.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //echo $request->input('imagename');
      
      $validation  = array();
      $validation['imagename'] =  "required";
      $validation['abc'] =  "required";
      if($request->hasFile('imagefile'))
      {
        $validation['imagefile'] =  "file|image";
      }
      $data = $request->validate( $validation);
      //$image = $request->imagefile->store('images/uploads/demo','public');
      
      $name = time().'.'.$request->imagefile->getClientOriginalExtension();
      $destinationPath = public_path('/images/uploaded/demo');
      $image = $request->imagefile->move($destinationPath,$name);
      image::create([
          'imagename' => $request->input('imagename'),
          'imageurl'  => $name
      ]);
      return redirect("/image");
     // dd(request()->imagefile);
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
        //
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
