<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class DebugController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if (!Auth::user()) {
            dd("Lépj be egy felhasználóval! (email: adatbázisból bármelyik random generált (id > 2); pw: password");
        }
        $user = User::with(['vehicles', 'offers', 'offers.parts'])->findOrFail(Auth::user()->id);
        return response()->json($user);
    }
}
