<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function courts(): HasMany
    {
        return $this->hasMany(SoccerCourt::class, 'establishment_id', 'id');
    }
}
