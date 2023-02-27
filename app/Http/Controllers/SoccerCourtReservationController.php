<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourtReservation;
use Illuminate\Http\Request;

class SoccerCourtReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($soccerCourt)
    {
        return SoccerCourtReservation::where('soccer_court_id', $soccerCourt)->get();
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
     * @param  \App\Models\SoccerCourtReservation  $soccerCourtReservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SoccerCourtReservation::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoccerCourtReservation  $soccerCourtReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoccerCourtReservation  $soccerCourtReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
