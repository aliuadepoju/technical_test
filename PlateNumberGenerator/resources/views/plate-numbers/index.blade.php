<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Generate PlateNumber</title>
       <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">


    </head>
    <body>
        <div class="container-fluid">
            @if (Route::has('login'))
                <div class="text-right links text-white  p-4 bg-dark mb-4">
                        <a href="/all-plates" >View All Plate Numbers</a>
                </div>
            @endif

            <div class="container">
                <div class="card mb-2">
                @if(count($generatedPlates) > 0)
                <p class="card-header">Generated Plate Number</p>
                <br>
                    @foreach($generatedPlates as $generatedPlate)
                        <p class="container">{{$generatedPlate->LGA}}
                           {{$generatedPlate->random_Number}}
                        {{$generatedPlate->character_Suffix}}
                        </p>
                        <hr>
                    @endforeach
                    @else
                    <p class="cadr-footer">No plates Generated yet</p>
                    @endif
                    <small >{{ $generatedPlates->links() }}</small>
                </div>

                <div class="card">
                    <p class="card-header">Generate Plate Numbers</p>
                    <div class="card-body">
                 {!! Form::open(['action' => 'PlateNumbersController@store', 'method' => 'POST','id'=>'submit', 'enctype' => 'multipart/form-data' ]) !!}
                        @csrf
                        <div class="form-group">
                            <label>Select LGA</label>
                            <select name="LGA" id="LGA" class="custom-select" required>
                                <option>Pick your LGA</option>
                           <option value="KUJ">
                            Kuje
                           </option>
                           <option value="ABJ">
                            Abaji
                           </option>
                           <option value="ABC">
                            Abuja Municipal
                           </option>
                           <option value="KWL">
                            Kwali
                           </option>
                           <option value="GWA">
                            Gwagwalada
                           </option>
                           <option value="BWR">
                            Bwari
                           </option>
                        </select>

                         @if ($errors->has('LGA'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('LGA') }}</strong>
                                    </span>
                         @endif

                        </div>

                        <div class="form-group">
                             <label>How many number of plates?</label>
                            <input type="number" class="form-control" name="plates_to_generate" placeholder="plates to generate" class="form-control" required>

                            @if ($errors->has('plates_to_generate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plates_to_generate') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group">
                        <button value="submit" class="btn btn-primary">Generate Plate(s)</button>
                        </div>
                    {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
