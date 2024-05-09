@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">#{{ $invoice->id }} számla</h2>
        <form class="my-5">
            @csrf
            <div class="form-group">
                <label for="user">Tulajdonos</label>
                <input type="text" class="form-control" name="user" value="{{ $invoice->user->name }}" disabled>
            </div>
            <div class="form-group">
                <label for="user">Jármű</label>
                <input type="text" class="form-control" name="vehicle" 
                    value="{{ $invoice->vehicle->manufacturer }} {{ $invoice->vehicle->type }} ({{ $invoice->vehicle->year }}) [{{ $invoice->vehicle->license_plate }}]" 
                    disabled>
            </div>
            <div class="form-group">
                <label for="fault_description">Hiba leírása</label>
                <textarea class="form-control" name="fault_description" disabled>{{ $invoice?->fault_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="repair_time">Munkanapok száma</label>
                <input type="number" class="form-control" name="repair_time" value="{{ $invoice?->repair_time }}" disabled>
            </div>
            <div class="form-group">
                <label for="labor_fee">Munkadíj</label>
                <input type="number" class="form-control" name="labor_fee" value="{{ $invoice?->labor_fee }}" disabled>
            </div>
            <div class="form-group">
                <label for="start_date">Kezdés dátuma</label>
                <input type="date" class="form-control" name="start_date" value="{{ $invoice?->start_date }}" disabled>
            </div>
            <div class="form-group">
                <label for="completion_date">Kezdés dátuma</label>
                <input type="date" class="form-control" name="completion_date" value="{{ $invoice?->completion_date }}" disabled>
            </div>
            <div class="form-group">
                <label for="parts">Alkatrészek</label>
                <ul name="parts">
                    @foreach ($invoice->parts as $part)
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
        </form>
    </div>
</section>
@endsection
