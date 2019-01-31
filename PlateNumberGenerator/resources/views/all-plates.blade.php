<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Generated plate numbers</title>
    <link rel="stylesheet" href="/css/app.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
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

        .btn-primary {
            background: blue;
            border-radius: 20px;
            color: white;
            padding: 10px;
        }

        small {
            font-size: 14px !important;
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

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 100;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        p{
            font-size: 14px!important;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref mb-4">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="/plate-numbers">Generate Plate</a>
            <a href="/all-plates">View All Plate Numbers</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif @endauth
        </div>
        @endif

        <div class="content">
            <br>
            <br>
            <br>
            <br>
            <div class="filter">
                {!! Form::open(['action' => 'HomeController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data' ]) !!} @csrf
                <div class="form-group">
                    <select name="LGAsearch" class="custom-select">
                        <option>Select LGA to filter</option>
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
                    <button value="submit" class="btn btn-primary">Filter By LGA</button>
                </div>
                {!! Form::close() !!}

            </div>



            <div class="title">
                <div class="plates">
                    <small>All Plate Numbers Generated So Far</small>

                    @if(count($generatedPlates) > 0)
                    @foreach($generatedPlates as $generatedPlate)
                    <p>{{$generatedPlate->LGA}}
                       {{$generatedPlate->random_Number}}
                       {{$generatedPlate->character_Suffix}}
                    </p>
                    <hr>
                     @endforeach
                    <small >{{ $generatedPlates->links() }}</small>
                    @else
                    <p>No plates generated so far</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

</body>

</html>
