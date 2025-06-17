<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    use HasFactory;
     protected $guarded = [];
     public function word(){
         return $this->belongsTo(Word::class);
         
     }
     public function address(){
         return $this->hasMany(Address::class);
     }
     
}
