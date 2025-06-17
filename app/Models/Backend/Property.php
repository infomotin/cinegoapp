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
    public function pstate()
    {
        $states = [
            'Alabama',
            'Alaska',
            'Arizona',
            'Arkansas',
            'California',
            'Colorado',
            'Connecticut',
            'Delaware',
            'District of Columbia',
            'Florida',
            'Georgia',
            'Hawaii',
            'Idaho',
            'Illinois',
            'Indiana',
            'Iowa',
            'Kansas',
            'Kentucky',
            'Louisiana',
            'Maine',
            'Maryland',
            'Massachusetts',
            'Michigan',
            'Minnesota',
            'Mississippi',
            'Missouri',
            'Montana',
            'Nebraska',
            'Nevada',
            'New Hampshire',
            'New Jersey',
            'New Mexico',
            'New York',
            'North Carolina',
            'North Dakota',
            'Ohio',
            'Oklahoma',
            'Oregon',
            'Pennsylvania',
            'Rhode Island',
            'South Carolina',
            'South Dakota',
            'Tennessee',
            'Texas',
            'Utah',
            'Vermont',
            'Virginia',
            'Washington',
            'West Virginia',
            'Wisconsin',
            'Wyoming'
        ];
        return $this->belongsTo(Property::class, 'state_name', in_array($this->state_name, $states) ? 'state_name' : '');
    }
}
