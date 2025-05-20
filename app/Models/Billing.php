<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $table = 'billings';

    protected $fillable = [
        'DESCRIPTION',
        'VAT_APPLICABLE',
        'isACTIVE',
        'VAT_RATE',
        'WITH_HOLDING_APPLICABLE',
        'WITH_HOLDING_RATE',
        'created_by',
        'created_by_type',
    ];
}
