<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function city(){
        return $this->hasMany(City::class);
    }
}
