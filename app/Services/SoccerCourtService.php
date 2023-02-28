<?php

namespace App\Services;

use App\Models\SoccerCourt;
use Exception;

class SoccerCourtService
{

    public function update($data, $id = null)
    {

        try {
            $isNew = false;
            $SoccerCourt = SoccerCourt::find($id);
            if (empty($SoccerCourt)) {
                $SoccerCourt = new SoccerCourt();

                $isNew = true;
            }

            $SoccerCourt->establishment_id = $data['establishment_id'];
            $SoccerCourt->court_type = $data['court_type'];
            $SoccerCourt->name = $data['name'];
            $SoccerCourt->width = $data['width'];
            $SoccerCourt->length = $data['length'];
            $SoccerCourt->price = $data['price'];
            $SoccerCourt->status = $isNew ? true : $data['status'];
            $SoccerCourt->saveOrFail();

            return $SoccerCourt;
        } catch (Exception $e) {
            return response()->json(['message' => 'Soccer Court update error. ' . $e->getMessage()], 422);
        }
    }
}
