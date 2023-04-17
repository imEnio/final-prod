<?php

namespace App\Http\Controllers\admin\API;

use App\Http\Controllers\Controller;

class BaseAPIController extends Controller
{
    public function apiResponse(callable $fn): \Illuminate\Http\JsonResponse
    {
        try {
            $data = call_user_func($fn);
            return response()->json(['Success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['Success' => false, 'error' => $e->getMessage()], $e->getCode());
        }
    }
}
