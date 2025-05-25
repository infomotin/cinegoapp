<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PackagePlan extends Model
{
    use HasFactory;
     protected $guarded = [];
    public function userName()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
