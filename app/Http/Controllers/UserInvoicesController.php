<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class UserInvoicesController extends Controller
{
    public function index() {
		return view('user.invoices.list', [
			'invoices' => Auth::user()->offers->whereNotNull('start_date')->whereNotNull('completion_date')->sortByDesc('completion_date'),
		]);
	}

    public function view(Request $request, int $id) {
        $offer = Auth::user()->offers->where('id', $id)->first();
        $grandTotal = $offer->labor_fee;
        foreach ($offer->parts as $part) {
            $grandTotal += $part->sell_price;
        }
		return view('user.invoices.view', [
			'invoice' => $offer,
            'grand_total' => $grandTotal,
		]);
	}
}
