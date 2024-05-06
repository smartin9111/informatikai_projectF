hejjhó

<a href="/admin/vehicles/edit/">Új gépjármű...</a>

<table>
    <thead></thead>
@foreach ($vehicles as $vehicle)
    <p>{{ $vehicle->manufacturer }} {{ $vehicle->type }} ({{ $vehicle->year }}): {{ $vehicle->user->name }} <a href="/admin/vehicles/edit/{{ $vehicle->id }}">Szerkesztés</a> <a href="/admin/vehicles/delete/{{ $vehicle->id }}">Törlés</a></p>
@endforeach
</table>
