<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Generate PlateNumber</title>
        <link rel="stylesheet" href="/css/app.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 60vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .btn-primary{
                background: blue;
                border-radius: 20px;
                color:white;
                padding: 10px;
            }

            small{
                font-size: 14px!important;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref mb-2">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="/all-plates">View All Plate Numbers</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                @if(count($generatedPlates) > 0)
                <small>Generated Plate Number</small>
                <br>
                    @foreach($generatedPlates as $generatedPlate)
                        <small>{{$generatedPlate->LGA}}</small>
                        <small>{{$generatedPlate->random_Number}}</small>
                        <small>{{$generatedPlate->character_Suffix}}</small>
                        <hr>
                    @endforeach
                    @else
                    <p>No plates Generated yet</p>
                    @endif
                    <small >{{ $generatedPlates->links() }}</small>
                </div>

                <div class="Plates">
                 {!! Form::open(['action' => 'PlateNumbersController@store', 'method' => 'POST','id'=>'submit', 'enctype' => 'multipart/form-data' ]) !!}
                        @csrf
                        <div class="form-group">
                            <select name="LGA" id="LGA" class="custom-select">
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
                           <option value="BWR">
                            Bwari
                           </option>
                        </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="plates_to_generate" placeholder="plates to generate" class="form-control">
                        </div>


                        <div class="form-group">
                        <button value="submit" class="btn btn-primary">Generate</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </body>
</html>
