<form method="post" action="/admin/vehicles/edit/{{ $vehicle->id ?? ''}}">
    @csrf
    <input type="text" name="license_plate" value="{{ $vehicle->license_plate ?? ''}}">
    <input type="text" name="manufacturer" value="{{ $vehicle->manufacturer ?? ''}}">
    <input type="text" name="type" value="{{ $vehicle->type ?? ''}}">
    <input type="number" name="year" value="{{ $vehicle->year ?? ''}}">
    <select name="user_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $vehicle?->user?->id === $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>