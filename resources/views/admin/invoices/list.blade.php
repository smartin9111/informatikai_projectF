@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Számlák</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#invoices-table" data-items="tbody tr">
        </div>
        <table class="table table-striped" id="invoices-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tulajdonos</th>
                    <th>Jármű</th>
                    <th>Rendszám</th>
                    <th>Munka kezdete</th>
                    <th>Munka vége</th>
                    <th>Összesen</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->user->name }}</td>
                        <td>{{ $invoice->vehicle?->manufacturer }} {{ $invoice->vehicle?->type }}</td>
                        <td>{{ $invoice->vehicle?->license_plate }}</td>
                        <td>{{ $invoice->start_date }}</td>
                        <td>{{ $invoice->completion_date }}</td>
                        <td>{{ $invoice->labor_fee + $invoice->parts?->sum('sell_price') }}</td>
                        <td>
                            <button class="btn btn-secondary" onclick="window.location.href='/admin/invoices/view/{{ $invoice->id }}'">Megtekintés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
