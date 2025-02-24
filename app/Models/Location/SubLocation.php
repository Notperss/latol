<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubLocation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'main_location_id',
        'sub_location',
        'description',
        'is_active',
    ];

    public function MainLocations()
    {
        return $this->belongsTo(MainLocation::class);
    }
}
