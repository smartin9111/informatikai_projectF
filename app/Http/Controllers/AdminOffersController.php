<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Part;

class AdminOffersController extends Controller
{
    public function index() {
		return view('admin.offers.list', [
			'offers' => Offer::whereNull('start_date')->get(),
		]);
	}

    public function edit(Request $request, int $id = null) {
        $offer = Offer::find($id);
		return view('admin.offers.edit', [
			'offer' => $offer,
            'offer_part_ids' => $offer->parts->pluck('id')->toArray(),
            'parts' => Part::all()->sortBy('name'),
		]);
	}
}
