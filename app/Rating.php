<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    public function scopeByVenuesIds($query, $venues_ids)
    {
        return $query
            ->whereIn('venue_id', $venues_ids)
            ->avg('rating');
    }
}
