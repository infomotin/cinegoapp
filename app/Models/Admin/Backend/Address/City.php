<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function zone(){
        return $this->belongsTo(Zone::class);
    }
    public function policestation(){
        return $this->hasMany(PoliceStation::class);
    }

}
