<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Backend\PropertyType;
use App\Models\Admin\Backend\Amenities;
use App\Models\User;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'ptype_id', 'id');
    }
    public function amenities()
    {
        return $this->belongsTo(Amenities::class, 'amenities_id', 'id');
    }
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }
    public function multiImages()
    {
        return $this->hasMany(MultiImageProperty::class, 'property_id', 'id');
    }
    public function facilities()
    {
        return $this->hasMany(FacilityProperty::class, 'property_id', 'id');
    }
    public function getPropertyStatusAttribute($value)
    {
        return $value == 1 ? 'active' : 'inactive';
    }
    public function getPropertyStatusLabelAttribute()
    {
        return $this->property_status == 'active' ? 'Active' : 'Inactive';
    }
    public function getPropertyStatusClassAttribute()
    {
        return $this->property_status == 'active' ? 'badge badge-success' : 'badge badge-danger';
    }
    public function getPropertyStatusIconAttribute()
    {
        return $this->property_status == 'active' ? 'fa fa-check' : 'fa fa-times';
    }
    public function getPropertyStatusColorAttribute()
    {
        return $this->property_status == 'active' ? 'green' : 'red';
    }


}
