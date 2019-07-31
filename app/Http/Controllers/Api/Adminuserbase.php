<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Config;

class Adminuserbase extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	function __construct()
	{
		Config::set('jwt.auth','App\adminusertest');
		Config::set('auth.providers.users.model','App\adminusertest');
	  Auth::setDefaultDriver('api');
		
	}
}
