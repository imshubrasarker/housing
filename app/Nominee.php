<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = [
        'name',
        'hus_father',
        'birthday',
        'religion',
        'nationality',
        'nid',
        'address',
        'member_id',
        'picture'
        ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
