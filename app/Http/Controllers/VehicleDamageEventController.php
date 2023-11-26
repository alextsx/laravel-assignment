<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleDamageEventRequest;
use App\Models\VehicleDamageEvent;
use App\Services\VehicleDamageEventService;
use Illuminate\Http\Request;

class VehicleDamageEventController extends Controller
{

    protected $vehicleDamageEventService;

    public function __construct(VehicleDamageEventService $vehicleDamageEventService)
    {
        $this->vehicleDamageEventService = $vehicleDamageEventService;

    }

    public function show($id)
    {

        $vehicleDamageEvent = VehicleDamageEvent::with('vehicles')
            ->findOrFail($id);

        return view('damage-event', ['vehicleDamageEvent' => $vehicleDamageEvent]);
    }


    public function showCreateForm()
    {
        $attachableVehicles = $this->vehicleDamageEventService->getAttachableVehicles(null);
        return view(
            'add-damage-event',
            ['attachableVehicles' => $attachableVehicles]
        );
    }

    public function create(VehicleDamageEventRequest $request)
    {
        $validatedData = $request->validated();

        if (isset($validatedData['vehicles'])) {
            $vehicles = $validatedData['vehicles'];
            unset($validatedData['vehicles']);
        }

        $vehicleDamageEvent = VehicleDamageEvent::create($validatedData);

        if (isset($vehicles)) {
            $vehicleDamageEvent->vehicles()->attach($vehicles);
        }

        return redirect()->route('damage-event.createForm')->with('success', 'Damage event added successfully');
    }


    public function showEditForm($id)
    {
        $vehicleDamageEvent = VehicleDamageEvent::with('vehicles')
            ->findOrFail($id);

        $attachableVehicles = $this->vehicleDamageEventService->getAttachableVehicles($vehicleDamageEvent);
        $attachedVehicles = $this->vehicleDamageEventService->getAttachedVehicles($vehicleDamageEvent);

        return view(
            'edit-damage-event',
            [
                'vehicleDamageEvent' => $vehicleDamageEvent,
                'attachableVehicles' => $attachableVehicles,
                'attachedVehicles' => $attachedVehicles

            ]
        );

    }


    public function update(VehicleDamageEventRequest $request, $id)
    {
        $validatedData = $request->validated();

        $vehicles = $validatedData['vehicles'] ?? [];

        unset($validatedData['vehicles']);

        $vehicleDamageEvent = VehicleDamageEvent::findOrFail($id);
        $vehicleDamageEvent->update($validatedData);

        $vehicleDamageEvent->vehicles()->sync($vehicles);

        return redirect()->route('damage-event.editForm', ['id' => $id])->with('success', 'Damage event edited successfully');
    }


    public function delete(Request $request)
    {
        $vehicleDamageEvent = VehicleDamageEvent::findOrFail($request->id);
        $vehicleDamageEvent->delete();

        return redirect()->route('search-history')->with('success', 'Damage event deleted successfully');
    }


}