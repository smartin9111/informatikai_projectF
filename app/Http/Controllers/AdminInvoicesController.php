<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class AdminInvoicesController extends Controller
{
    public function index() {
		return view('admin.invoices.list', [
			'invoices' => Offer::whereNotNull('start_date')->whereNotNull('completion_date')->get()->sortByDesc('completion_date'),
		]);
	}

    public function view(Request $request, int $id) {
        $offer = Offer::find($id);
        $grandTotal = $offer->labor_fee;
        foreach ($offer->parts as $part) {
            $grandTotal += $part->sell_price;
        }
		return view('admin.invoices.view', [
			'invoice' => $offer,
            'grand_total' => $grandTotal,
		]);
	}
}
