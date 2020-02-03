<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    public function expenseHead()
    {
        return $this->belongsTo(ExpenceHead::class, 'expence_head_id');
    }
}
