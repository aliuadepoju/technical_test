<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Generated plate numbers</title>
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">


</head>

<body>
    <div class="Container-fluid mb-4">
        @if (Route::has('login'))
        <div class="text-right links bg-dark p-4">
            @auth
            <a href="/plate-numbers">Generate Plate</a> |
            <a href="/all-plates">View All Plate Numbers</a>
            @else
            <a href="{{ route('login') }}">Login</a> |

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif @endauth
        </div>
        @endif

        {{--filter plates--}}
        <div class="container">
            <div class="card mb-4">
                <p class="card-header">Filter Search Plate Numbers</p>
            <div class="filter card-body">
                {!! Form::open(['action' => 'HomeController@index', 'method' => 'GET', 'enctype' => 'multipart/form-data' ]) !!} @csrf
                <div class="form-group">
                    <label>Select  LGA</label>
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

                <div class="form-group card-footer">
                    <button value="submit" class="btn btn-primary">Filter By LGA</button>
                </div>
                {!! Form::close() !!}

            </div>
            </div>


            {{--all generated plates--}}
            <div class="card">

                    <p class="card-header">All Plate Numbers Generated So Far</p>

                    @if(count($generatedPlates) > 0)
                    @foreach($generatedPlates as $generatedPlate)
                    <p class="card-body">
                        {{$generatedPlate->LGA}}
                       {{$generatedPlate->random_Number}}
                       {{$generatedPlate->character_Suffix}}
                    </p>
                    <hr>
                     @endforeach
                    <small class="card-footer">{{ $generatedPlates->links() }}</small>
                    @else
                    <p>No plates generated so far</p>
                    @endif


            </div>
        </div>
    </div>

</body>

</html>
