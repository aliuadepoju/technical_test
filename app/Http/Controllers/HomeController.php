<?php

namespace App\Http\Controllers;

use App\PlateNumber;
use Illuminate\Http\Request;

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
        $plateNumbers = auth()->user()->plateNumbers()->latest('id')->paginate(PlateNumber::PER_PAGE);

        return view('home', compact('plateNumbers'));
    }
}
