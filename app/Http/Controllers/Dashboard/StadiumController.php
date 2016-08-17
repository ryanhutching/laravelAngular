<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\StadiumService;
use Illuminate\Http\Response;

class StadiumController extends Controller
{
    public $stadiumService;

    /** @param StadiumService $stadiumService */
    public function __construct(StadiumService $stadiumService)
    {
        $this->stadiumService = $stadiumService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create() {
        if(request()->ajax()) {
            return \Response::json($this->stadiumService->create(request()->all()));
        }
        return redirect()->back();
    }

    /**
     * Get All Stadiums
     * @return \Illuminate\Http\JsonResponse
    */
    public function getAllStadiums() {
        if(request()->ajax()) {
            return \Response::json($this->stadiumService->getAllStadiums());
        }
        return redirect()->back();
    }

    /**
     * Return stadiums with clubs
     * @return Response
    */
    public function getStadiumsWithClubs() {
        if(request()->ajax()) {
            return \Response::json($this->stadiumService->getStadiumsWithClubs());
        }
        return redirect()->back();
    }

}
