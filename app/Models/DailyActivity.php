<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyActivity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'sub_location_id',
        'user_id',
        'start_date',
        'end_date',
        'description',
        'status',
    ];
}
