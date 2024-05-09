<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Part;
use App\Models\User;

class AdminOffersController extends Controller
{
    public function index() {
		return view('admin.offers.list', [
			'offers' => Offer::whereNull('start_date')->get(),
			'users' => User::all(),
		]);
	}

    public function edit(Request $request, int $id) {
        $offer = Offer::find($id);
		return view('admin.offers.edit', [
			'offer' => $offer,
            'offer_part_ids' => $offer?->parts->pluck('id')->toArray(),
            'parts' => Part::all()->sortBy('name'),
		]);
	}

	public function new(Request $request) {
        $offer = new Offer();
		$offer->user_id = $request->get('user_id');
		$offer->save();
		return redirect()->route('admin.offers.edit', $offer->id);
	}

	public function upsert(Request $request, int $id) {
        $offer = $id ? Offer::find($id) : new Offer();
		$offer->fill($request->only([
			'fault_description',
			'repair_time',
			'labor_fee',
			'vehicle_id',
		]));
		$offer->parts()->sync(
			$request->get('parts'),
		);
		$offer->save();
		return redirect()->route('admin.offers');
	}

	public function delete(Request $request, int $id) {
		Offer::find($id)->delete();
		return redirect()->route('admin.offers');
	}

	public function toWorksheet(Request $request, int $id) {
		$offer = Offer::find($id);
		$offer->start_date = $request->get('start_date');
		$offer->save();
		return redirect()->route('admin.offers');
	}
}
