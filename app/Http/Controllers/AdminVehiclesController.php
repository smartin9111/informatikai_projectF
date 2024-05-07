<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;

class AdminVehiclesController extends Controller
{
    public function index() {

		return view('admin.vehicles.read', [
			'vehicles' => Vehicle::all(),
		]);
	}

	public function edit(Request $request, int $id = null) {
		return view('admin.vehicles.edit', [
			'vehicle' => $id ? Vehicle::find($id) : new Vehicle(),
			'users' => User::all(),
		]);
	}

	public function upsert(Request $request, int $id = null) {
		$vehicle = $id ? Vehicle::find($id) : new Vehicle();
		$vehicle->fill($request->only([
			'license_plate',
			'manufacturer',
			'type',
			'year',
			'user_id',
		]));
		$vehicle->save();
		return redirect()->route('admin.vehicles');
	}

	public function delete(Request $request, int $id) {
		Vehicle::find($id)->delete();
		return redirect()->route('admin.vehicles');
	}
}
