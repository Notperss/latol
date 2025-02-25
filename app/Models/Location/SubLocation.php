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
        'name',
        'description',
        // 'is_active',
    ];

    public function MainLocation()
    {
        return $this->belongsTo(MainLocation::class);
    }
}
