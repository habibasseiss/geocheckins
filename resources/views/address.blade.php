@extends('layouts.app')

@section('title', 'Search results')

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
    <div class="col-md-8 col-md-offset-2">

        <p class="lead text-muted">
            Showing results for <code>{{ $request->address }}</code> within a
            range of <code>{{ $request->radius }}</code> km.
        </p>

        <div id="map" style="height: 500px; max-width: 700px"></div>
        <br>

        <p>
            Latitude: {{ $coordinates->getLatitude() }}
            <br>
            Longitude: {{ $coordinates->getLongitude() }}
        </p>

        <p class="lead">
            <strong>Venues found</strong>:
            {{ $venues->get()->count() }}
        </p>

        <hr>

        <a href="{{ route('home') }}">&larr; Back</a>
    </div>
@endsection
