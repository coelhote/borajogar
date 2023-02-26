<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Services\PlanService;
use Exception;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private $plan;

    public function __construct(PlanService $plan)
    {
        $this->plan = $plan;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Plan::where('status', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->plan->update($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Plan::find($id);
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
        return $this->plan->update($request->all(), $id);
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
            $plan = Plan::find($id);

            $plan->status = false;
            $plan->save();

            return response()->json(['message' => 'Plan excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Plan exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
