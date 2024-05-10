@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Árajánlatok</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#offers-table" data-items="tbody tr">
            <button class="btn btn-secondary" onclick="window.location.href='/offers/edit/'">Új árajánlat</button>
        </div>
        <table class="table table-striped" id="offers-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jármű</th>
                    <th>Rendszám</th>
                    <th>Összesen</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->vehicle?->manufacturer }} {{ $offer->vehicle?->type }}</td>
                        <td>{{ $offer->vehicle?->license_plate }}</td>
                        <td>{{ $offer->labor_fee + $offer->parts?->sum('sell_price') }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="window.location.href='/offers/edit/{{ $offer->id }}'">Szerkesztés</button>
                            <button class="btn btn-secondary" onclick="window.location.href='/offers/delete/{{ $offer->id }}'">Törlés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection