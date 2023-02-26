<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Services\EstablishmentService;
use Exception;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{

    private $establishment;

    public function __construct(EstablishmentService $establishment)
    {
        $this->establishment = $establishment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Establishment::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->establishment->update($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Establishment::find($id);
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
        return $this->establishment->update($request->all(), $id);
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
            $plan = Establishment::find($id);

            $plan->status = false;
            $plan->save();

            return response()->json(['message' => 'Establishment excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Establishment exclusion failed. '. $e->getMessage()], 422);
        }
    }
}
