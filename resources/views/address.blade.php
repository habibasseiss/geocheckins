@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Address</div>

                <div class="panel-body">
                    Latitude: {{ $coordinates->getLatitude() }}
                    <br>
                    Longitude: {{ $coordinates->getLongitude() }}

                    <hr>

                    <a href="{{ route('home') }}">&larr; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
