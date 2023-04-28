<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Currency extends Model {
    use UUID;

    protected $table = 'currencies';
    protected $fillable = ['name', 'currency_code', 'exchange_rate'];
}