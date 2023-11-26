<?php

namespace App\Services;

use App\Models\Vehicle;

class VehicleService
{
    public function createVehicle($data)
    {
        $data['license_plate'] = $this->convertLicensePlateToValidFormat($data['license_plate']);

        if ($data['image']) {
            $path = $data['image']->storePublicly('images', 'public');
            $data['img_url'] = asset("storage/$path");
        }

        Vehicle::create($data);
    }

    public function editVehicle($data, $id)
    {


        $updatedData = [
            'brand' => $data['brand'],
            'model' => $data['model'],
            'year' => $data['year'],
        ];


        $vehicleInDb = $this->getVehicle($id);

        if (isset($data['image']) && $data['image']) {
            $path = $data['image']->storePublicly('images', 'public');
            $updatedData['img_url'] = asset("storage/$path");

            //deleting old image
            if ($vehicleInDb->img_url && $data['image']) {
                $this->deleteVehicleImg($id);
            }
        }


        $vehicleInDb->update($updatedData);
    }


    public function getVehicle($id)
    {
        return Vehicle::where('id', $id)->first();
    }

    //check if - in license plate
    //if not add it in the middle like ABC-123
    //and convert the entire thing to uppercase
    public function convertLicensePlateToValidFormat($license_plate)
    {
        if (strpos($license_plate, '-') === false) {
            $license_plate = substr($license_plate, 0, 3) . '-' . substr($license_plate, 3);
        }

        return strtoupper($license_plate);
    }

    public function deleteVehicleImg($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();

        if ($vehicle->img_url) {
            if (strpos($vehicle->img_url, 'http') !== false)
                return;
            $path = str_replace(asset('storage/'), '', $vehicle->img_url);
            unlink(storage_path("app/public/$path"));
        }
    }
}