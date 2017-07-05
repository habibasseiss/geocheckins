@extends('layouts.app')

@section('extraScript')
<script type="text/javascript">
  var map;
  function initMap() {
    latLng = new google.maps.LatLng({{ $coordinates->getLatitude() }}, {{ $coordinates->getLongitude() }});

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: latLng,
      mapTypeId: 'terrain'
    });

    var marker = new google.maps.Marker({
      position: latLng,
      map: map
    });

  }
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Search result</div>

                <div class="panel-body">

                    <div class="col-md-8 col-md-offset-2">

                        <p class="lead text-muted">
                            Showing results for <code>{{ $request->address }}</code>
                        </p>

                        <div id="map" style="height: 500px; width: 700px"></div>
                        <br>

                        <p>
                            Latitude: {{ $coordinates->getLatitude() }}
                            <br>
                            Longitude: {{ $coordinates->getLongitude() }}
                        </p>

                        <p>Venues found: {{ $venues->get()->count() }}</p>

                        <hr>

                        <a href="{{ route('home') }}">&larr; Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
