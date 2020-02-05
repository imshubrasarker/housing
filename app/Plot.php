<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    public function sale()
    {
        return $this->hasMany(Sale::class, 'plot_id');
    }
}
