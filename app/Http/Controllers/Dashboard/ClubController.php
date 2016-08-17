<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ClubService;

class ClubController extends Controller
{

    /**
     * Return all clubs
     * @param ClubService $clubService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllClubs(ClubService $clubService) {
        if(request()->ajax()) {
            return \Response::json($clubService->getAllClubs());
        }
        return redirect()->back();
    }

    /**
     * Return all clubs with teams
     * @param ClubService $clubService
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllClubsWithTeams(ClubService $clubService) {
        if(request()->ajax()) {
            return \Response::json($clubService->getAllClubsWithTeams());
        }
        return redirect()->back();
    }

    /**
     * @param ClubService $clubService
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(ClubService $clubService)
    {
        if(request()->ajax()) {
            return \Response::json($clubService->create(request()->all()));
        }
        return redirect()->back();
    }

    /**
     * Show Men's clubs
     * @param ClubService $clubService
     */
    public function getMenClubs(ClubService $clubService) {
        dd($clubService->getMenClubs()->toArray());
    }

    /**
     * Show Women's clubs
     * @param ClubService $clubService
     */
    public function getWomenClubs(ClubService $clubService) {
        dd($clubService->getWomenClubs()->toArray());
    }

    /**
     * Show Youth's clubs
     * @param ClubService $clubService
     */
    public function getYouthClubs(ClubService $clubService) {
        dd($clubService->getYouthClubs()->toArray());
    }

    /**
     * Show Recently changed clubs
     * @param ClubService $clubService
     */
    public function getRecentlyChangedClubs(ClubService $clubService) {
        dd($clubService->getYouthClubs()->toArray());
    }

}
