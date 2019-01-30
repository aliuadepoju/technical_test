@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Generated Plates Numbers
                    <a href="{{ route('plate-number.create') }}" class="btn btn-outline-primary btn-sm
                    float-lg-right">Generate</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-1:striped table-inverse">
                            <thead class="thead-inverse">
                            <tr>
                                <th>LGA</th>
                                <th>Code</th>
                                <th>Plate Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plateNumbers as $plateNumber)
                                <tr>
                                    <td scope="row">{{ $plateNumber->lga }}</td>
                                    <td>{{ $plateNumber->code }}</td>
                                    <td>{{ $plateNumber->number }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div class="text-center">{{ $plateNumbers->render() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
