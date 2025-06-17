<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $guarded = [];
    //country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // district
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
