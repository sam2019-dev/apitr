<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\Http\Resources\post as postResource;
use App\Http\Resources\postCollection as postResourceCollection;

class apicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // print_r(Post::all());
	   foreach(post::all() as $psts)
	   {
		   echo $psts->details."<br>";
	   }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
		//dd(Post::find($id)->details);
		$post = \DB::select("select * from posts p ,comments c where p.id='1' and p.id = c.post_id");
		//$pobject =  new \stdClass();
		//$pobject->data = $post;
		return new postResourceCollection(post::hydrate($post));
		//return json_encode($pobject);
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
