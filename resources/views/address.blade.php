@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Search result</div>

                <div class="panel-body">

                    <p class="lead text-muted">
                        Showing results for <code>{{ $request->address }}</code>
                    </p>

                    Latitude: {{ $coordinates->getLatitude() }}
                    <br>
                    Longitude: {{ $coordinates->getLongitude() }}

                    <br><br>

                    Venues found: {{ $venues->get()->count() }}

                    <hr>

                    <a href="{{ route('home') }}">&larr; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
