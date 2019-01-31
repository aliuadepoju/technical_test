<?php

namespace App\Http\Controllers;
use App\PlateNumbers;
use Illuminate\Http\Request;
use App\Http\Requests;
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
    public function index(Request $request)
    {
    //display all plates if search input is empty
    $LGAsearch = $request->input('LGAsearch');
     if($LGAsearch != ''){
        $generatedPlates = PlateNumbers::where('LGA', 'LIKE', $LGAsearch)->orderBy('id','Desc')->paginate(3);
         return view('/all-plates')->with('generatedPlates',$generatedPlates);
    }
        else{
        $generatedPlates = PlateNumbers::orderBy('id','Desc')->paginate(3);
        return view('/all-plates')->with('generatedPlates',$generatedPlates);;
    }
}
}
