<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Excel;

use Yajra\DataTables\Facades\DataTables;

class LayoutController extends BaseController
{
	public function indexHome(Request $request){
        
        return view('layouts/home');
    }

}