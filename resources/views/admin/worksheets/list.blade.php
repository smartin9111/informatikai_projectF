@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Munkalapok</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#worksheets-table" data-items="tbody tr">
        </div>
        <table class="table table-striped" id="worksheets-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tulajdonos</th>
                    <th>Jármű</th>
                    <th>Rendszám</th>
                    <th>Munka kezdete</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($worksheets as $worksheet)
                    <tr>
                        <td>{{ $worksheet->id }}</td>
                        <td>{{ $worksheet->user->name }}</td>
                        <td>{{ $worksheet->vehicle?->manufacturer }} {{ $worksheet->vehicle?->type }}</td>
                        <td>{{ $worksheet->vehicle?->license_plate }}</td>
                        <td>{{ $worksheet->start_date }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="window.location.href='/admin/worksheets/view/{{ $worksheet->id }}'">Megtekintés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection