<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    public function scopeCountByVenuesIds($query, $venues_ids)
    {
        return $query
            ->whereIn('venue_id', $venues_ids);
    }
}
