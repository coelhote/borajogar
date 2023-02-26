<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'trading_name',
        'document',
        'plan',
        'status'
    ];

    protected $hidden = [
        'user_id'
    ];
}
