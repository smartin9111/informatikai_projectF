<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserVehiclesController extends Controller
{
    public function index() {

		return view('user.vehicles.list', [
			'vehicles' => Auth::user()->vehicles,
		]);
	}

	public function edit(Request $request, int $id = null) {
		return view('user.vehicles.edit', [
			'vehicle' => $id ? Auth::user()->vehicles->where('id', $id)->first() : new Vehicle(),
		]);
	}

	public function upsert(Request $request, int $id = null) {
		$vehicle = $id ? Auth::user()->vehicles->where('id', $id)->first() : new Vehicle();
		$vehicle->fill($request->only([
			'license_plate',
			'manufacturer',
			'type',
			'year',
		]));
        $vehicle->user()->associate(Auth::user());
		$vehicle->save();
		return redirect()->route('user.vehicles');
	}

	public function delete(Request $request, int $id) {
		Auth::user()->vehicles->where('id', $id)->first()->delete();
		return redirect()->route('user.vehicles');
	}
}
