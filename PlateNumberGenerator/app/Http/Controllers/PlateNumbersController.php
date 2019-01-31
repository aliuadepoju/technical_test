<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\PlateNumbers;



class PlateNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $generatedPlates = PlateNumbers::orderBy('id','Desc')->take($request->input('plates_to_generate'))->paginate(3);
        return view('plate-numbers.index')->with('generatedPlates',$generatedPlates);



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
         $this->validate($request, [
             //check form if it has correct details
            'LGA' => 'required',
            'plates_to_generate' => 'required|digits',

        ]);

        //get plates user wants to print
        $plateNumbersToGenerate = $request->input('plates_to_generate');

        //convert string to integer
        $int = (int)$plateNumbersToGenerate;


        if($int < 2){
        //get last inserted plate Number
        $generatedPlatesLatests = PlateNumbers::where('LGA',$request->input('LGA'))->orderBy('id','Desc')->take(1)->first();

        //Check if LGA has been recorded before
         if (!$generatedPlatesLatests) {
            $lastnum = 000;
         }else{
             $lastnum = $generatedPlatesLatests->random_Number;
         }



         //instantiate object of plateNumbers Class
        $plateNumbers = new PlateNumbers();
            $plateNumbers->LGA = $request->input('LGA');

            $defaultnum = 000;

            if($lastnum >= 999){
            $integer = $defaultnum;
            $digitNumber = 3;
            $integer++;

            $plateNumbers->random_Number = sprintf('%0' . $digitNumber . 'd', $integer);
            }

            else{
            $integer = $lastnum;
            $integer++;
            $digitNumber = 3;
            $plateNumbers->random_Number = sprintf('%0' . $digitNumber . 'd', $integer);
            }

           //$plateNumbers->random_Number = str_pad($num,4,"0",STR_PAD_LEFT);

           //Character suffix
           $defaultletter = 'AA';

           //check if LGA and Random Number then change Alphabet
           $generatedPlates = PlateNumbers::where('LGA',$request->input('LGA'))->where('random_Number', '<=', 999);

         if($generatedPlates){

             $plateNumbers->character_Suffix =  $defaultletter;
           }else{

             $defaultletter++;
             $plateNumbers->character_Suffix =  $defaultletter;
        };
        $plateNumbers->save();

        $generatedPlates = PlateNumbers::orderBy('id','Desc')->take(2)->get();


        return back()->with('generatedPlates', $generatedPlates);
         }



         //Generate more than one plate

         else{


         //insert multiple plates to db
        for($generate = 0; $generate < $int; $generate++){

        //generate random numbers that decrement when with LGA

        $generatedPlatesLatests = PlateNumbers::where('LGA',$request->input('LGA'))->orderBy('id','Desc')->take(1)->first();


         if (!$generatedPlatesLatests) {
            $lastnum = 000;
         }else{
             $lastnum = $generatedPlatesLatests->random_Number;
         }


         //instantiate object of plateNumbers Class
        $plateNumbers = new PlateNumbers();
            $plateNumbers->LGA = $request->input('LGA');

            $defaultnum = 000;

            if($lastnum >= 999){
            $integer = $defaultnum;
            $digitNumber = 3;
            $integer++;

            $plateNumbers->random_Number = sprintf('%0' . $digitNumber . 'd', $integer);
            }

            else{
            $integer = $lastnum;
            $integer++;
            $digitNumber = 3;
            $plateNumbers->random_Number = sprintf('%0' . $digitNumber . 'd', $integer);
            }

           //$plateNumbers->random_Number = str_pad($num,4,"0",STR_PAD_LEFT);

           //Character suffix
           $defaultletter = 'AA';

           //check if LGA and Random Number then change Alphabet
           $generatedPlates = PlateNumbers::where('LGA',$request->input('LGA'))->where('random_Number', '<=', 999);

         if($generatedPlates){

             $plateNumbers->character_Suffix =  $defaultletter;
           }else{

             $defaultletter++;
             $plateNumbers->character_Suffix =  $defaultletter;
        };

        $plateNumbers->save();

        $generatedPlates = PlateNumbers::orderBy('id','Desc')->get();

         }
        return back()->with('generatedPlates', $generatedPlates);
         }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlateNumbers  $plateNumbers
     * @return \Illuminate\Http\Response
     */
    public function show(PlateNumbers $plateNumbers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlateNumbers  $plateNumbers
     * @return \Illuminate\Http\Response
     */
    public function edit(PlateNumbers $plateNumbers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlateNumbers  $plateNumbers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlateNumbers $plateNumbers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlateNumbers  $plateNumbers
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlateNumbers $plateNumbers)
    {
        //
    }
}
