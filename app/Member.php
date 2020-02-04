<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'hus_father',
        'nationality',
        'birthday',
        'mother',
        'profession',
        'religion',
        'present_address',
        'permanent_address',
        'mobile',
        'email',
        'nid',
        'picture',
        'serial_id'
    ];

    public function nominee()
    {
        return $this->hasMany(Nominee::class);
    }
}
