<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Helpers;
use App\Models\User;

class DashboardController extends Controller
{
    /** @var array $data */
    protected $data = [];


    /**
     * Show index page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('index');
    }
}
