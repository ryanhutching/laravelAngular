<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{

    public $userService;

    /** @param UserService $userService */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create() {
        if(request()->ajax()) {
            return \Response::json($this->userService->create(request()->all()));
        }
        return redirect()->back();
    }


    /**
     * Get All Users
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUsers() {
        if(request()->ajax()) {
            return \Response::json($this->userService->getAllUsers());
        }
        return redirect()->back();
    }
}
