<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DebugController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = User::find(2);
        $vehicle = $user->vehicles->first();
        return response()->json([
            'user' => $user,
            'vehicle' => $vehicle,
        ]);
    }
}
