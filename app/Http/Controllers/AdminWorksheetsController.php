<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class AdminWorksheetsController extends Controller
{
    public function index() {
		return view('admin.worksheets.list', [
			'worksheets' => Offer::whereNotNull('start_date')->whereNull('completion_date')->get()->sortBy('start_date'),
		]);
	}

    public function view(Request $request, int $id) {
        $offer = Offer::find($id);
        $grandTotal = $offer->labor_fee;
        foreach ($offer->parts as $part) {
            $grandTotal += $part->sell_price;
        }
		return view('admin.worksheets.view', [
			'worksheet' => $offer,
            'grand_total' => $grandTotal,
		]);
	}

    public function toInvoice(Request $request, int $id) {
		$offer = Offer::find($id);
		$offer->completion_date = $request->get('completion_date');
		$offer->save();
		return redirect()->route('admin.worksheets');
	}
}
