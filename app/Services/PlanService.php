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

            $plan->user_id = $data['user_id'];
            $plan->company_name = $data['company_name'];
            $plan->trading_name = $data['trading_name'];
            $plan->document = $data['document'];
            $plan->plan = $data['plan'];
            $plan->status = $isNew ? true : $data['status'];
            $plan->saveOrFail();

            return $plan;
        } catch (Exception $e) {
            return response()->json(['message' => 'Plan update error. ' . $e->getMessage()], 422);
        }
    }
}
