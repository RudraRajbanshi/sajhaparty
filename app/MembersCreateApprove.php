<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembersCreateApprove extends Model
{
    use SoftDeletes;

    protected $dates = [
        'approved_at',
    ];

    protected $fillable = [
        'case_id',
        'created_by_user_id',
        'member_id',
        'approved_by_user_id',
        'approved_at'
    ];

    public function approvedBy()
    {
        return $this->hasOne(User::class, 'user_code', 'created_by_user_id');
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'user_code', 'approved_by_user_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'member_code');
    }
}
