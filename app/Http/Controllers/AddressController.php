<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Services\AddressService;
use Exception;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $address;

    public function __construct(AddressService $address)
    {
        $this->address = $address;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Address::where('user_id', request()->header('user_id'))->where('status', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->address->update($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Address::find($id);
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
        return $this->address->update($request->all(), $id);
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
            $address = Address::find($id);

            $address->status = false;
            $address->save();

            return response()->json(['message' => 'Address excluded'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Address exclusion failed. '. $e->getMessage()], 422);
        }

    }
}
