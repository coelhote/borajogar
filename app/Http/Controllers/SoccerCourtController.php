<?php

namespace App\Http\Controllers;

use App\Models\SoccerCourt;
use App\Services\SoccerCourtService;
use Exception;
use Illuminate\Http\Request;

class SoccerCourtController extends Controller
{

    private $soccerCourt;

    public function __construct(SoccerCourtService $soccerCourt)
    {
        $this->soccerCourt = $soccerCourt;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SoccerCourt::where('status', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->soccerCourt->update($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SoccerCourt::find($id);
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
        return $this->soccerCourt->update($request->all(), $id);
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
            $SoccerCourt = SoccerCourt::find($id);

            $SoccerCourt->status = false;
            $SoccerCourt->save();

            return response()->json(['message' => 'SoccerCourt excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'SoccerCourt exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
