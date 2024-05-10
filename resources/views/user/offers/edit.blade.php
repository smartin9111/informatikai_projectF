@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">#{{ $offer->id }} árajánlat módosítása</h2>
        <form class="my-5" method="post" action="/offers/edit/{{ $offer->id ?? ''}}">
            @csrf
            <div class="form-group">
                <label for="vehicle_id">Jármű</label>
                <select class="form-control" name="vehicle_id">
                    @foreach (Auth()->user()?->vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" {{ $vehicle->id === $offer?->vehicle?->id ? 'selected' : ''}}>
                            {{ $vehicle->manufacturer }} {{ $vehicle->type }} ({{ $vehicle->year }}) [{{ $vehicle->license_plate }}]
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fault_description">Hiba leírása</label>
                <textarea class="form-control" name="fault_description">{{ $offer?->fault_description }}</textarea>
            </div>
            @if ($offer->repair_time)
            <div class="form-group">
                <label for="repair_time">Munkanapok száma</label>
                <input type="number" class="form-control" name="repair_time" value="{{ $offer?->repair_time }}" disabled>
            </div>
            @endif
            @if ($offer->labor_fee)
            <div class="form-group">
                <label for="labor_fee">Munkadíj</label>
                <input type="number" class="form-control" name="labor_fee" value="{{ $offer?->labor_fee }}" disabled>
            </div>
            @endif
            @if ($offer->parts->count())
            <div class="form-group">
                <label for="parts">Alkatrészek</label>
                <ul name="parts">
                    @foreach ($offer->parts as $part)
                        <li>
                            {{ $part->name }} ({{ $part->manufacturer }} {{ $part->type }}) [{{ $part->sell_price }}]
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($grand_total)
            <div class="form-group">
                <label for="grand_total">Összesen</label>
                <input type="number" class="form-control" name="grand_total" value="{{ $grand_total }}" disabled>
            </div>
            @endif
            <button type="submit" class="btn btn-primary mt-3">Mentés</button>
        </form>
    </div>
</section>
@endsection
