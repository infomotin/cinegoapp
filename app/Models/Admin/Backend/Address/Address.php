<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
        protected $guarded = [];

        public function road(){
            return $this->belongsTo(Road::class);
        }
}
