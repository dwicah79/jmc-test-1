<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $fillable = ['name', 'population', 'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
