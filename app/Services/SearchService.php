<?php

namespace App\Services;

use App\Models\SearchHistory;
use App\Models\Vehicle;

class SearchService
{

    protected $vehicleService;
    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    public function search($query)
    {
        /* 
            license plate is in the following format: ABC-123
            the search should be case insensitive
            and ABC123 is also an allowed format 
        */
        $query = $this->vehicleService->convertLicensePlateToValidFormat($query);

        $vehicle = Vehicle::with([
            'vehicleDamageEvents' => function ($query) {
                $query->orderBy('date', 'desc');
            }
        ])
            ->where('license_plate', '=', $query)
            ->first();

        $this->saveSearchHistory($query);

        if (!$vehicle) {
            return null;
        }

        return $vehicle;
    }

    protected function saveSearchHistory(string $query)
    {
        $searchHistory = new SearchHistory();
        $searchHistory->search_term = $query;
        $searchHistory->user_id = auth()->user()->id;
        $searchHistory->search_date = now();
        $searchHistory->save();
    }


    public function history()
    {
        $searchHistories = SearchHistory::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($searchHistories as $history) {
            $vehicle = Vehicle::where('license_plate', $history->search_term)->first();
            if ($vehicle) {
                $history->vehicle = $vehicle;
            }
        }

        return $searchHistories;
    }
}