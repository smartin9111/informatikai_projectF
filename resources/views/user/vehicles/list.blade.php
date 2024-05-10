@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Járművek</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#vehicles-table" data-items="tbody tr">
            <button class="btn btn-secondary" onclick="window.location.href='/vehicles/edit/'">Új jármű</button>
        </div>
        <table class="table table-striped" id="vehicles-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gyártó</th>
                    <th>Típus</th>
                    <th>Évjárat</th>
                    <th>Rendszám</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->manufacturer }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ $vehicle->year }}</td>
                        <td>{{ $vehicle->license_plate }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="window.location.href='/vehicles/edit/{{ $vehicle->id }}'">Szerkesztés</button>
                            <button class="btn btn-secondary" onclick="window.location.href='/vehicles/delete/{{ $vehicle->id }}'">Törlés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection