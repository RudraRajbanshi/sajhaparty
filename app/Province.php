<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    public $table = 'provinces';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        'inactive' => 'Inactive',
        'active'   => 'Active',
    ];

    protected $fillable = [
        'name',
        'province_code',
        'status',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function provinceDistricts()
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }
}
