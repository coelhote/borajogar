<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourtType;
use Exception;
use Illuminate\Http\Request;

class SoccerCourtTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SoccerCourtType::where('status', 1)->get();
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
        return SoccerCourtType::find($id);
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
            $SoccerCourtType = SoccerCourtType::find($id);

            $SoccerCourtType->status = false;
            $SoccerCourtType->save();

            return response()->json(['message' => 'Soccer Court Type excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Soccer Court Type exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
