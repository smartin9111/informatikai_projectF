@extends('frontend.frontend_dashboard')
@section('main')
<datalist id="parts-list">
    
</datalist>

<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">#{{ $offer->id }} árajánlat módosítása</h2>
        <form class="my-5" method="post" action="/admin/offers/edit/{{ $offer->id ?? ''}}">
            @csrf
            <div class="form-group">
                <label for="user">Tulajdonos</label>
                <input type="text" class="form-control" name="user" value="{{ $offer->user->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="user_id">Jármű</label>
                <select class="form-control" name="vehicle_id">
                    @foreach ($offer->user?->vehicles as $vehicle)
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
            <div class="form-group">
                <label for="repair_time">Munkanapok száma</label>
                <input type="number" class="form-control" name="repair_time" value="{{ $offer?->repair_time }}">
            </div>
            <div class="form-group">
                <label for="labor_fee">Munkadíj</label>
                <input type="number" class="form-control" name="labor_fee" value="{{ $offer?->labor_fee }}">
            </div>
            <div class="form-group">
                <input type="text" class="filter-input" data-target="#ms-parts-select .ms-selectable" data-items=".ms-elem-selectable">
                <label for="parts[]">Alkatrészek</label>
                <select class="form-control ignore multiselect" multiple="multiple" id="parts-select" name="parts[]">
                    @foreach ($parts as $part)
                        <option value="{{ $part->id }}" {{ in_array($part->id, $offer_part_ids) ? 'selected' : '' }}>
                            {{ $part->name }} ({{ $part->manufacturer }} {{ $part->type }}) [{{ $part->sell_price }}]
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3" disabled>Mentés</button>
        </form>
    </div>
</section>
@endsection
