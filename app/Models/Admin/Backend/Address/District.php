<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function zones()
    {
        return $this->hasMany(Zone::class);
    }
}
