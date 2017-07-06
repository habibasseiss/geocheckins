<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function checkins()
    {
        return $this->hasMany('App\Checkin');
    }

    public function scopeFilterByCoordinates($query, $latitude, $longitude, $radius=10) {
        return $query->select(
            DB::raw("
                id,latitude,longitude,
                (
                    3959 * acos(
                         cos( radians(  ?  ) ) *
                         cos( radians( latitude ) ) *
                         cos( radians( longitude ) - radians(?) ) +
                         sin( radians(  ?  ) ) *
                         sin( radians( latitude ) )
                     )
                 ) AS distance")
            )
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->setBindings([$latitude, $longitude, $latitude])
            ;
    }
}
