<?php

namespace App\Services;

use App\Models\Address;
use Exception;

class AddressService
{

    public function update($data, $id = null)
    {

        try {
            $isNew = false;
            $address = Address::find($id);
            if (!empty($address)) {
                $address = new Address();
                $isNew = true;
            }

            $address->user_id = request()->header('user_id');
            $address->zip_code = $data['zip_code'];
            $address->street = $data['street'];
            $address->number = $data['number'];
            $address->complement = $data['complement'];
            $address->city = $data['city'];
            $address->state = $data['state'];
            $address->country = $data['country'];
            $address->coordinates = $data['coordinates'];
            $address->status = $isNew ? true : $data['status'];
            $address->saveOrFail();

            return $address;

            
        } catch (Exception $e) {
            return response()->json(['message' => 'Address update error. '. $e->getMessage()], 422);
        }
    }
}
