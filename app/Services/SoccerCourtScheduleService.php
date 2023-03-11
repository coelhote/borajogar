<?php

namespace App\Services;

use App\Models\SoccerCourt;
use App\Models\SoccerCourtSchedule;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class SoccerCourtScheduleService
{

    public function create($data, $soccer_court)
    {

        try {

            foreach($data as $scheduleData){
                Log::info('entrou');
                
                $hourStart = $scheduleData['first_hour'];

                [$hours, $mins] = explode(':', $scheduleData['period']);
                $period = ($hours * 60) + $mins;

                while (Carbon::parse($hourStart)->format('H:i:s') != Carbon::parse($scheduleData['last_hour'])->format('H:i:s')) {
                    Log::info('loop');
                    $schedule = new SoccerCourtSchedule();
                    $schedule->soccer_court = $soccer_court;
                    $schedule->weekday = $scheduleData['weekday'];
                    $schedule->start_at = Carbon::parse($hourStart)->format('H:i:s');
                    $schedule->end_at = Carbon::parse($hourStart)->addMinutes($period)->format('H:i:s');
                    Log::info($schedule);
                    $schedule->saveOrFail();
                    $hourStart = Carbon::parse($hourStart)->addMinutes($period)->format('H:i:s');
                }
                Log::info('fim loop');
            }

            return SoccerCourt::with(['schedules', 'type'])->find($soccer_court);
        } catch (Exception $e) {
            return response()->json(['message' => 'Soccer Court update error. ' . $e->getMessage()], 422);
        }
    }
}
