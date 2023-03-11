<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourtSchedule;
use App\Services\SoccerCourtScheduleService;
use Exception;
use Illuminate\Http\Request;

class SoccerCourtScheduleController extends Controller
{
    private $soccerCourtSchedule;

    public function __construct(SoccerCourtScheduleService $soccerCourtSchedule)
    {
        $this->soccerCourtSchedule = $soccerCourtSchedule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SoccerCourtSchedule::where('status', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $soccer_court)
    {
        return $this->soccerCourtSchedule->create($request->all(), $soccer_court);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SoccerCourtSchedule::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $soccer_court, $id)
    {
        //return $this->soccerCourtSchedule->update($request->all(), $soccer_court, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            SoccerCourtSchedule::where('id', $id)->delete();

            return response()->json(['message' => 'Soccer Court Schedule excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Soccer Court Schedule exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
