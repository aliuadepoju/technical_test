@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Generated Plates Number</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('errorMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('errorMsg') }}
                            </div>
                        @endif

                        <form action="{{ route('plate-number.store') }}" method="post" class="">
                            @csrf
                            <div class="form-group">
                                <label for="lga">Local Government Area</label>
                                <select class="form-control" name="lga" id="lga" required>
                                    <option value="ABJ">Abaji</option>
                                    <option value="ABC">Abuja Municipal</option>
                                    <option value="GWA">Gwagwalada</option>
                                    <option value="KUJ">Kuje</option>
                                    <option value="BWR">Bwari</option>
                                    <option value="KWL">Kwali</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="qty">Number of plates</label>
                                <input type="number" class="form-control" id="qty" name="qty"
                                       placeholder="Number of plates to generate" required>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Generate</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
