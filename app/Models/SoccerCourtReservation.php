<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SoccerCourtReservation extends Model
{
    use HasFactory;


    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function group(): HasOne
    {
        return $this->hasOne;//(Group::class, 'id', 'group_id');
    }

    public function schedule(): HasOne
    {
        return $this->hasOne(SoccerCourtSchedule::class, 'id', 'schedule_id');
    }


}
