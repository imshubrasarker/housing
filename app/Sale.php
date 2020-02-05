<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id');
    }
}
