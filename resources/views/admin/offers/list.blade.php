@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Árajánlatok</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#offers-table" data-items="tbody tr">
            <button class="btn btn-secondary" onclick="window.location.href='/admin/offers/edit/'">Új árajánlat</button>
        </div>
        <table class="table table-striped" id="offers-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tulajdonos</th>
                    <th>Jármű</th>
                    <th>Rendszám</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->user->name }}</td>
                        <td>{{ $offer->vehicle->manufacturer }} {{ $offer->vehicle->type }}</td>
                        <td>{{ $offer->vehicle->license_plate }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="window.location.href='/admin/offers/edit/{{ $offer->id }}'">Szerkesztés</button>
                            <button class="btn btn-secondary" onclick="window.location.href='/admin/offers/delete/{{ $offer->id }}'">Törlés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection