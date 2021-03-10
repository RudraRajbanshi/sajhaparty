<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hierarchy extends Model
{
    protected $fillable = [
        'id',
        'hierarchy_id',
        'title',
        'slug',
        'parent_id'
    ];

    public function child()
    {
        return $this->hasMany(Hierarchy::class, 'parent_id', 'hierarchy_id');
    }

    public function children()
    {
        return $this->hasMany(Hierarchy::class, 'parent_id', 'hierarchy_id')->with('children');
    }
}
