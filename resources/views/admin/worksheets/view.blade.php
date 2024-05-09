@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">#{{ $worksheet->id }} munkalap</h2>
        <form class="my-5">
            @csrf
            <div class="form-group">
                <label for="user">Tulajdonos</label>
                <input type="text" class="form-control" name="user" value="{{ $worksheet->user->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="user">Jármű</label>
                <input type="text" class="form-control" name="vehicle" 
                    value="{{ $worksheet->vehicle->manufacturer }} {{ $worksheet->vehicle->type }} ({{ $worksheet->vehicle->year }}) [{{ $worksheet->vehicle->license_plate }}]" 
                    disabled>
            </div>
            <div class="form-group">
                <label for="fault_description">Hiba leírása</label>
                <textarea class="form-control" name="fault_description" disabled>{{ $worksheet?->fault_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="repair_time">Munkanapok száma</label>
                <input type="number" class="form-control" name="repair_time" value="{{ $worksheet?->repair_time }}" disabled>
            </div>
            <div class="form-group">
                <label for="labor_fee">Munkadíj</label>
                <input type="number" class="form-control" name="labor_fee" value="{{ $worksheet?->labor_fee }}" disabled>
            </div>
            <div class="form-group">
                <label for="start_date">Kezdés dátuma</label>
                <input type="date" class="form-control" name="start_date" value="{{ $worksheet?->start_date }}" disabled>
            </div>
            <div class="form-group">
                <label for="parts">Alkatrészek</label>
                <ul name="parts">
                    @foreach ($worksheet->parts as $part)
                        <li>
                            {{ $part->name }} ({{ $part->manufacturer }} {{ $part->type }}) [{{ $part->sell_price }}]
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="form-group">
                <label for="grand_total">Összesen</label>
                <input type="number" class="form-control" name="grand_total" value="{{ $grand_total }}" disabled>
            </div>
            <button id="to-invoice-button" type="button" class="btn btn-success mt-3">Számla kiállítása</button>
        </form>
    </div>
</section>

<div id="to-invoice-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Számla kiállítása (összeg: {{ $grand_total }})</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/admin/worksheets/to-invoice/{{ $worksheet->id }}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="completion_date">Munka befejezése:</label>
                <input type="date" name="completion_date" class="form-control">
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
