<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WhmApiService;

class WhmController extends Controller
{
    protected $whmApiService;

    public function __construct(WhmApiService $whmApiService)
    {
        $this->whmApiService = $whmApiService;
    }

    public function getAppList($function)
    {
        try {
            $services = $this->whmApiService->getAppList($function);
            return response()->json($services);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            // user and password from request body
            $services = $this->whmApiService->changePassword();
            return response()->json($services);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
