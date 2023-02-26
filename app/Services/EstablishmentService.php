<?php

namespace App\Services;

use App\Models\Establishment;
use Exception;

class EstablishmentService
{

    public function update($data, $id = null)
    {

        try {
            $isNew = false;
            $establishment = Establishment::find($id);
            if (empty($establishment)) {
                $establishment = new Establishment();

                $isNew = true;
            }
            
            $establishment->user_id = $data['user_id'];
            $establishment->company_name = $data['company_name'];
            $establishment->trading_name = $data['trading_name'];
            $establishment->document = $data['document'];
            $establishment->plan = $data['plan'];
            $establishment->status = $isNew ? true : $data['status'];
            $establishment->saveOrFail();

            return $establishment;

        } catch (Exception $e) {
            return response()->json(['message' => 'Establishment update error. '. $e->getMessage()], 422);
        }
    }
}
