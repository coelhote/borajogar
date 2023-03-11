<?php

namespace App\Http\Controllers;

use App\Models\Equipaments;
use Illuminate\Http\Request;

class EquipamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Equipaments::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipaments = new Equipaments();
        
        foreach($request->all() as $data){
            $equipaments->name = $data['name'];
            $equipaments->icon = $data['icon'];
            $equipaments->saveOrFail();
        }

        return Equipaments::get();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipaments  $equipaments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Equipaments::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipaments  $equipaments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipaments  $equipaments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
