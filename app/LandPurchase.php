<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandPurchase extends Model
{
    protected $fillable = [
        'donor_name', 'land_volume', 'stain_number', 'ledger', 'shotok_price', 'total_price', 'paid_amount', 'deu_amount'
    ];
}
