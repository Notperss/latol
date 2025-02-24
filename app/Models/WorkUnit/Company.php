<?php

namespace App\Models\WorkUnit;

use App\Models\WorkUnit\Directorate;
use App\Models\WorkUnit\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'logo',
        'description',
    ];
}
