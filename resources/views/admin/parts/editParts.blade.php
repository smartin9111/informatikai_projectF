@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">{{ $part?->id ? "#$part->id alkatrész szerkesztése" : 'Új alkatrész'}}</h2>
        <form class="my-5" method="post" action="/admin/parts/editParts/{{ $part->id ?? ''}}">
            @csrf
            <div class="form-group">
                <label for="name">Megnevezés</label>
                <input type="text" class="form-control" name="name" value="{{ $part->name ?? ''}}">
            </div>
            <div class="form-group">
                <label for="manufacturer">Gyártó</label>
                <input type="text" class="form-control" name="manufacturer" value="{{ $part->manufacturer ?? ''}}">
            </div>
            <div class="form-group">
                <label for="type">Típus</label>
                <input type="text" class="form-control" name="type" value="{{ $part->type ?? ''}}">
            </div>
            <div class="form-group">
                <label for="delivery_time">Beérkezési idő</label>
                <input type="number" class="form-control" name="delivery_time" value="{{ $part->delivery_time ?? ''}}">
            </div>
            <div class="form-group">
                <label for="purchase_price">Beszerzési ár</label>
                <input type="number" class="form-control" name="purchase_price" value="{{ $part->purchase_price ?? ''}}">
            </div>
            <div class="form-group">
                <label for="sell_price">Eladási ár</label>
                <input type="number" class="form-control" name="sell_price" value="{{ $part->sell_price ?? ''}}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mentés</button>
        </form>
    </div>
</section>
@endsection
