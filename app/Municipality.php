<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use SoftDeletes;

    public $table = 'municipalities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'wards',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
        'district_id',
        'municipality_code',
        'status'
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
