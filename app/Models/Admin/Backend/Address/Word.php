<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function policestation(){
        return $this->belongsTo(PoliceStation::class);
    }
    public function landmark(){
        return $this->hasMany(Landmark::class);
    }
}
