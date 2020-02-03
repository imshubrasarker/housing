<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenceHead extends Model
{
    public function expenses() {
        return $this->hasMany(Expence::class, 'expence_head_id');
    }
}
