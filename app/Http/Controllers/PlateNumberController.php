<?php

namespace App\Http\Controllers;

use App\PlateNumber;
use Illuminate\Http\Request;
use Validator;

class PlateNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plate_number.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validation = Validator::make($request->all(), [
            "lga" => "bail|required|string|max:3",
            "qty" => "bail|required|integer"
        ]);

        // Return appropriate error message if any
        if ($validation->fails()) {
            return back()->with('errorMsg', 'Oops, please make sure you fill out the form.');
        }

        // Generate and persist the plate numbers
        try {
            PlateNumber::generate($request->lga, $request->qty);
            return redirect()->route('home');
        }
        catch (\Exception $exception) {
            return back()->with('errorMsg', 'Oops.. An error occurred, please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlateNumber $plateNumber
     * @return \Illuminate\Http\Response
     */
    public function show(PlateNumber $plateNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlateNumber $plateNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(PlateNumber $plateNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PlateNumber $plateNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlateNumber $plateNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlateNumber $plateNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlateNumber $plateNumber)
    {
        //
    }
}
