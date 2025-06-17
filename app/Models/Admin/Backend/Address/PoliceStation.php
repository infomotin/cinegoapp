<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceStation extends Model
{
    use HasFactory;
        protected $guarded = [];
        public function city(){
            return $this->belongsTo(City::class);
        }
        public function word(){
            return $this->hasMany(Word::class);
        }
}
