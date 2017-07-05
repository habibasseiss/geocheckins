<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function info()
    {
        $venues_count = Venue::count();

        return view('info')->with(compact('venues_count'));
    }

    public function address(Request $request)
    {
        $adapter = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\ProviderAggregator();

        $geocoder->registerProviders([
            new \Geocoder\Provider\GoogleMaps($adapter),
        ]);

        $geocode = $geocoder
            ->geocode($request->address);

        $location = $geocode->first();
        $coordinates = $location->getCoordinates();

        $venues = Venue::filterByCoordinates(
            $coordinates->getLatitude(),
            $coordinates->getLongitude(),
            $request->radius);

        return view('address')->with(compact('location', 'coordinates', 'venues', 'request'));
    }
}
