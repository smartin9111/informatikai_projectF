<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;

class AdminPartsController extends Controller
{
    public function index() {

		return view('admin.parts.readParts', [
			'parts' => Part::all(),
		]);
	}

	public function edit(Request $request, int $id = null) {
		return view('admin.parts.editParts', [
			'part' => $id ? Part::find($id) : new Part(),
		]);
	}

	public function upsert(Request $request, int $id = null) {
		$part = $id ? Part::find($id) : new Part();
		$part->fill($request->only([
			'name',
			'manufacturer',
			'type',
			'delivery_time',
            'purchase_price',
            'sell_price',
		]));
		$part->save();
		return redirect()->route('admin.parts');
	}

    public function delete(Request $request, int $id) {
		Part::find($id)->delete();
		return redirect()->route('admin.parts');
	}
}