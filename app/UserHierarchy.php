<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHierarchy extends Model
{
    protected $fillable = [
        'user_id',
        'hierarchy_id',
        'access_location_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_code');
    }

    public function hierarchy()
    {
        return $this->belongsTo(Hierarchy::class, 'hierarchy_id', 'hierarchy_id');
    }
}
