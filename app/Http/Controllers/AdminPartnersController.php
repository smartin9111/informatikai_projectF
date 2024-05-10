<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminPartnersController extends Controller
{
    public function index() {

		return view('admin.partners.list', [
			'partners' => User::all(),
		]);
	}

	public function edit(Request $request, int $id = null) {
		return view('admin.partners.edit', [
			'partner' => $id ? User::find($id) : new User(),
		]);
	}

	public function upsert(Request $request, int $id = null) {
		$partner = $id ? User::find($id) : new User();
		$partner->fill($request->only([
			'name',
			'username',
			'email',
			'phone',
			'address',
        ]));
        if ($password = $request->get('password')) {
            $partner->password = Hash::make($password);
        }
		$partner->save();
		return redirect()->route('admin.partners');
	}

	public function delete(Request $request, int $id) {
		User::find($id)->delete();
		return redirect()->route('admin.partners');
	}
}
