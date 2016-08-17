<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\TeamService;

class TeamController extends Controller
{
    /**
     * @param TeamService $teamService
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(TeamService $teamService)
    {
        if(request()->ajax()) {
            return \Response::json($teamService->create(request()->all()));
        }
        return redirect()->back();
    }
}
