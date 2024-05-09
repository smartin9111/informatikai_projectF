@extends('frontend.frontend_dashboard')
@section('main')
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
                <label for="vehicle_id">Jármű</label>
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
                <label for="parts[]">Alkatrészek</label>
                <select class="form-control ignore multiselect" multiple="multiple" id="parts-select" name="parts[]">
                    @foreach ($parts as $part)
                        <option value="{{ $part->id }}" {{ in_array($part->id, $offer_part_ids) ? 'selected' : '' }}>
                            {{ $part->name }} ({{ $part->manufacturer }} {{ $part->type }}) [{{ $part->sell_price }}]
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mentés</button>
            <button id="to-worksheet-button" type="button" class="btn btn-success mt-3">Munkalap kiállítása</button>
        </form>
    </div>
</section>

<div id="to-worksheet-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Munkalap kiállítása</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/admin/offers/to-worksheet/{{ $offer->id }}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="start_date">Munka kezdete:</label>
                <input type="date" name="start_date" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Kiállítás</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
