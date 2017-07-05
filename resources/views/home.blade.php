@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">

                    <p class="lead text-muted">
                        Use the form below to search for an address and give a radius limit to
                        get the venues for the specified region. E.g. address
                        <code>4888 Gore Rd, Highgate Center, VT 05459, USA</code> and radius
                        <code>100</code> km.
                    </p>

                    <form action="{{ route('address') }}" method="post" class="col-md-6 col-md-offset-3">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Search for some address..." required>
                        </div>
                        <div class="form-group">
                            <label for="radius">Within radius (km)</label>
                            <input type="text" class="form-control" id="radius" name="radius" placeholder="Within the radius of..." required>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
