<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainLocation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'main_location',
        'description',
    ];

    public function SubLocation()
    {
        return $this->hasMany(SubLocation::class);
    }
}
