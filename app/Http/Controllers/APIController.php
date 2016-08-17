<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UploadJsonRequest;
use App\Http\Controllers\Controller;


use App\Services\UploadService;

class APIController extends Controller
{
    public function index() {
        return view('api.index');
    }

    public function uploadJson(UploadJsonRequest $request, UploadService $uploadService) {
        $uploadService->uploadJson($request);
        return redirect('/api/index');
    }
}
