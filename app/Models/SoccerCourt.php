<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SoccerCourt extends Model
{
    use HasFactory;

    public function schedules(): HasMany
    {
        return $this->hasMany(SoccerCourtSchedule::class, 'soccer_court', 'id');
    }

    public function type(): HasOne
    {
        return $this->hasOne(SoccerCourtType::class, 'id', 'court_type');
    }

    public function equipaments(): HasMany
    {
        return $this->hasMany(SoccerCourtEquipament::class, 'soccer_court', 'id');
    }
}
