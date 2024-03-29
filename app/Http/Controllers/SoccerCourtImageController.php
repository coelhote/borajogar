<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourtImage;
use Exception;
use Illuminate\Http\Request;

class SoccerCourtImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SoccerCourtImage::where('status', 1)->get();
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
        return SoccerCourtImage::find($id);
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
            $SoccerCourtImage = SoccerCourtImage::find($id);

            $SoccerCourtImage->status = false;
            $SoccerCourtImage->save();

            return response()->json(['message' => 'Soccer Court Image excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Soccer Court Image exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
