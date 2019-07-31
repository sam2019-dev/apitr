<?php

namespace App\Http\Controllers\Api;

use App\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\myresource;

class apinew extends Controller
{
    public function __construct()
    {
		 parent::__construct();
         $this->middleware('jwt', ['except' => ['login']]);
		
    }
    public function getposts()
	{
       $post=  post::all();
       return new myresource($post);
	}
}
