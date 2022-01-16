<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pay()
    {
        return view('payment');
    }

    public function thank()
    {
        return view('thank');
    }
}
