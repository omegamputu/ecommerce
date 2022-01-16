<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::select('id', 'name')->get();
        return view('home', compact('countries'));
    }
}
