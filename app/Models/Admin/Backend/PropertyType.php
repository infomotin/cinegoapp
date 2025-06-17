<?php

namespace App\Models\Admin\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Property;

class PropertyType extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function properties()
    {
        return $this->hasMany(Property::class, 'ptype_id', 'id');
    }
}
