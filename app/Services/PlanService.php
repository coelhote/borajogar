<?php

namespace App\Services;

use App\Models\Plan;
use Exception;

class PlanService
{

    public function update($data, $id = null)
    {

        try {
            $isNew = false;
            $plan = Plan::find($id);
            if (empty($plan)) {
                $plan = new Plan();

                $isNew = true;
            }

            $plan->name = $data['name'];
            $plan->description = $data['description'];
            $plan->price = $data['price'];
            $plan->status = $isNew ? true : $data['status'];
            $plan->saveOrFail();

            return $plan;
        } catch (Exception $e) {
            return response()->json(['message' => 'Plan update error. ' . $e->getMessage()], 422);
        }
    }
}
