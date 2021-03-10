<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberAddress extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'province_id',
        'district_id',
        'municipality_id',
        'ward_no',
        'toll_no',
        'address_type',
        'membership_code',
        'member_id'
    ];

    public function member()
    {
        return $this->belongsTo('App\Member', 'membership_code', 'membership_code');
    }

    public function district()
    {
        return $this->hasOne('App\District', 'id', 'district_id');
    }

    public function municipality()
    {
        return $this->hasOne('App\Municipality', 'id', 'municipality_id');
    }

    public function province()
    {
        return $this->hasOne('App\Province', 'id', 'province_id');
    }
}
