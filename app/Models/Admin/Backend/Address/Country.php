<?php

namespace App\Models\Admin\Backend\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];
    //Division
    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

}
