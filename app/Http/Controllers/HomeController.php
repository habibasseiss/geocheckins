<?php

namespace App\Http\Controllers;

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

    public function address(Request $request)
    {
        $adapter = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\ProviderAggregator();

        $geocoder->registerProviders([
            new \Geocoder\Provider\GoogleMaps($adapter),
        ]);

        $geocode = $geocoder
            ->geocode($request->address);

        // dd($geocode);
        $location = $geocode->first();
        $coordinates = $location->getCoordinates();

        return view('address')->with(compact('location', 'coordinates'));
    }
}
