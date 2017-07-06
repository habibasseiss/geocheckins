<?php

namespace App\Http\Controllers;

use App\Venue;
use App\Customer;
use App\Rating;
use App\Checkin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $customers_count = Customer::count();
        $ratings_count = Rating::count();

        return view('info')->with(compact('venues_count', 'customers_count', 'ratings_count'));
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

        $venues_ids = $venues->pluck('id');
        $average_rating = Rating::averageByVenuesIds($venues_ids);
        $checkins_count = Checkin::countByVenuesIds($venues_ids)->count();

        $customers = Customer::filterByCoordinates(
            $coordinates->getLatitude(),
            $coordinates->getLongitude(),
            $request->radius);

        return view('address')->with(compact(
            'location',
            'coordinates',
            'venues',
            'average_rating',
            'checkins_count',
            'customers',
            'request'
        ));
    }
}
