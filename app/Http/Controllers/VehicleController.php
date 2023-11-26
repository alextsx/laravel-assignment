<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Services\VehicleService;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function showCreateForm()
    {
        return view('add-vehicle');
    }

    public function create(VehicleRequest $request)
    {
        $vehicle = $request->validated();

        $this->vehicleService->createVehicle($vehicle);
        return redirect()->route('vehicle.createForm')->with('success', 'Vehicle added successfully');
    }

    public function showEditForm($id)
    {
        $vehicle = $this->vehicleService->getVehicle($id);

        if (!$vehicle) {
            return redirect()->route('vehicle.createForm')->with('error', 'Vehicle not found');
        }

        return view('edit-vehicle', ['vehicle' => $vehicle]);
    }

    public function update(VehicleRequest $request, $id)
    {
        $vehicle = $request->validated();

        $this->vehicleService->editVehicle($vehicle, $id);
        return redirect()->route('vehicle.editForm', ['id' => $id])->with('success', 'Vehicle edited successfully');
    }


}