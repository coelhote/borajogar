<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourtSchedule;
use Exception;
use Illuminate\Http\Request;

class SoccerCourtScheduleController extends Controller
{
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
            $SoccerCourtSchedule = SoccerCourtSchedule::find($id);

            $SoccerCourtSchedule->status = false;
            $SoccerCourtSchedule->save();

            return response()->json(['message' => 'Soccer Court Schedule excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Soccer Court Schedule exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
