<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class UserOffersController extends Controller
{
    public function index() {
		return view('user.offers.list', [
			'offers' => Auth::user()->offers->whereNull('start_date'),
		]);
	}

    public function edit(Request $request, int $id = null) {
        $offer = $id ? Auth::user()->offers->where('id', $id)->first() : new Offer();
        $grandTotal = $offer->labor_fee ?? 0;
        foreach ($offer->parts as $part) {
            $grandTotal += $part->sell_price;
        }
		return view('user.offers.edit', [
			'offer' => $offer,
            'grand_total' => $grandTotal,
		]);
	}

	public function upsert(Request $request, int $id = null) {
        $offer = $id ? Auth::user()->offers->where('id', $id)->first() : new Offer();
		$offer->fill($request->only([
			'fault_description',
			'vehicle_id',
		]));
        $offer->user()->associate(Auth::user());
		$offer->save();
		return redirect()->route('user.offers');
	}

	public function delete(Request $request, int $id) {
		Auth::user()->offers->where('id', $id)->first()->delete();
		return redirect()->route('user.offers');
	}
}
