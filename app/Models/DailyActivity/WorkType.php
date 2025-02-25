<?php

namespace App\Models\DailyActivity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'status',
    ];
}
