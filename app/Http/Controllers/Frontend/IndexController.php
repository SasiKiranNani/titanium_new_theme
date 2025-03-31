<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function home()
    {
        return view('frontend.index');
    }
}
