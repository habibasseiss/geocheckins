<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function checkins()
    {
        return $this->hasMany('App\Checkin');
    }

    public function scopeFilterByCoordinates($query, $latitude, $longitude, $radius=1)
    {
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
                 ) AS distance

                 -- (select count(venue_id) from checkins
                 -- where checkins.venue_id = venues.id
                 -- group by checkins.venue_id) AS quant,

                 -- (select sum(rating) from ratings
                 -- where ratings.venue_id = venues.id
                 -- group by ratings.venue_id) AS rating_sum
                 ")
            )
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->setBindings([$latitude, $longitude, $latitude])
            ;
    }
}
