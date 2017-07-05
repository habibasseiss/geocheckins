@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <p class="lead text-muted">
        Use the form below to search for an address and give a radius limit to
        get the venues for the specified region. E.g. address
        <code>4888 Gore Rd, Highgate Center, VT 05459, USA</code> and radius
        <code>10</code> km.
    </p>

    <div class="row">
        <form action="{{ route('address') }}" method="post" class="col-md-6 col-md-offset-3">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Search for some address..." required>
            </div>
            <div class="form-group">
                <label for="radius">Within radius (km)</label>
                <input type="number" class="form-control" id="radius" name="radius" placeholder="Within the radius of..." required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

@endsection
