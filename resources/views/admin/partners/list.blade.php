@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Partnerek</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#partners-table" data-items="tbody tr">
            <button class="btn btn-secondary" onclick="window.location.href='/admin/partners/edit/'">Új partner</button>
        </div>
        <table class="table table-striped" id="partners-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Név</th>
                    <th>Email cím</th>
                    <th>Telefonszám</th>
                    <th>Járművek száma</th>
                    <th>Ajánlatok száma</th>
                    <th>Számlák száma</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $partner->id }}</td>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->email }}</td>
                        <td>{{ $partner->phone }}</td>
                        <td>{{ $partner->vehicles->count() }}</td>
                        <td>{{ $partner->offers->count() }}</td>
                        <td>{{ $partner->offers->whereNotNull('start_date')->whereNotNull('completion_date')->count() }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="window.location.href='/admin/partners/edit/{{ $partner->id }}'">Szerkesztés</button>
                            <button class="btn btn-secondary" onclick="window.location.href='/admin/partners/delete/{{ $partner->id }}'">Törlés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection