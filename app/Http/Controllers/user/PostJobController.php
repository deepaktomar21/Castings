<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostJobController extends Controller
{
    public function postjobForm()
    {

        return view('website.postJobForm'); 

    }
}
