@extends('layouts.app')

@section('title', 'Search results')

@section('extraScript')
<script type="text/javascript">
  var map;
  var venues;

  function initMap() {
    latLng = new google.maps.LatLng({{ $coordinates->getLatitude() }}, {{ $coordinates->getLongitude() }});

    map = new google.maps.Map(document.getElementById('map'), {
      center: latLng,
      mapTypeId: 'terrain'
    });

    var marker = new google.maps.Marker({
      position: latLng,
      map: map
    });

    var circle = new google.maps.Circle({
        strokeColor: '#FF0000',
        strokeOpacity: 0.5,
        strokeWeight: 2,
        fillOpacity: 0.1,
        map: map,
        center: latLng,
        radius: {{ $request->radius*1000 }}
      });

    map.fitBounds(circle.getBounds());

  }
</script>
@endsection

@section('content')
    <div class="col-md-8 col-md-offset-2">

        <p class="lead text-muted">
            Showing results for <code>{{ $request->address }}</code> within a
            range of <code>{{ $request->radius }}</code> km.
        </p>

        <p class="lead">
            <strong>Venues found</strong>:
            {{ $venues->get()->count() }}

            <br>

            <strong>Customers found</strong>:
            {{ $customers->get()->count() }}

            <br>

            <strong>Average venue rating</strong>:
            {{ $average_rating }}
        </p>

        <div id="map" style="height: 500px; max-width: 700px"></div>
        <br>

        <p>
            Latitude: {{ $coordinates->getLatitude() }}
            <br>
            Longitude: {{ $coordinates->getLongitude() }}
        </p>

        <hr>

        <a href="{{ route('home') }}">&larr; Back</a>
    </div>
@endsection
