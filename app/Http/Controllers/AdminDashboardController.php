<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Vehicle;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        $labor_fee = [];
        $vehicle_id = [];

        foreach ($offers as $offer) {
            $labor_fee[] = $offer->labor_fee;
            $vehicle_id[] = $offer->vehicle_id;
        }
        $partners = User::all();

        return view('admin.dashboard.dashboard', [
            'labor_fee' => $labor_fee,
            'vehicle_id' => $vehicle_id,
            'partners' => $partners,
        ]);
    }
}