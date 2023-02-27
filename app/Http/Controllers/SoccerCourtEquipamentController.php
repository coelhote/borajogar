<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourtEquipament;
use Exception;
use Illuminate\Http\Request;

class SoccerCourtEquipamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SoccerCourtEquipament::where('status', 1)->get();
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
        return SoccerCourtEquipament::find($id);
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
            $SoccerCourtEquipament = SoccerCourtEquipament::find($id);

            $SoccerCourtEquipament->status = false;
            $SoccerCourtEquipament->save();

            return response()->json(['message' => 'Soccer Court Equipament excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Soccer Court Equipament exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
