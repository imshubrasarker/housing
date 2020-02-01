<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name', 'ac_number', 'slip_no'];

    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'bank_id');
    }
}
