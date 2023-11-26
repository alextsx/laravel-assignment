<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\SearchHistory;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(SearchRequest $request)
    {
        $query = $request->get('searchterm');
        $vehicle = $this->searchService->search($query);
        return view('search-results', ['vehicle' => $vehicle]);
    }
    public function history(Request $request)
    {
        $searchHistories = $this->searchService->history();

        return view('search-history', ['searchHistories' => $searchHistories]);
    }
}