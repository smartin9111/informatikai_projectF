@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">{{ $vehicle?->id ? "#$vehicle->id jármű szerkesztése" : 'Új jármű'}}</h2>
        <form class="my-5" method="post" action="/admin/vehicles/edit/{{ $vehicle->id ?? ''}}">
            @csrf
            <div class="form-group">
                <label for="license_plate">Rendszám</label>
                <input type="text" class="form-control" name="license_plate" value="{{ $vehicle->license_plate ?? ''}}">
            </div>
            <div class="form-group">
                <label for="manufacturer">Gyártó</label>
                <input type="text" class="form-control" name="manufacturer" value="{{ $vehicle->manufacturer ?? ''}}">
            </div>
            <div class="form-group">
                <label for="type">Típus</label>
                <input type="text" class="form-control" name="type" value="{{ $vehicle->type ?? ''}}">
            </div>
            <div class="form-group">
                <label for="year">Évjárat</label>
                <input type="number" class="form-control" name="year" value="{{ $vehicle->year ?? ''}}">
            </div>
            <div class="form-group">
                <label for="user_id">Tulajdonos</label>
                <select class="form-control" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $vehicle?->user?->id === $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>    
            <button type="submit" class="btn btn-primary mt-3">Mentés</button>
        </form>
    </div>
</section>
@endsection

