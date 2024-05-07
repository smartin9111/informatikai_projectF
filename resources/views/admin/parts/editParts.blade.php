<form method="post" action="/admin/parts/editParts/{{ $part->id ?? ''}}">
    @csrf
    <input type="text" name="manufacturer" value="{{ $part->manufacturer ?? ''}}">
    <input type="text" name="name" value="{{ $part->name ?? ''}}">
    <input type="text" name="type" value="{{ $part->type ?? ''}}">
    <input type="text" name="delivery_time" value="{{ $part->delivery_time ?? ''}}">
    <input type="number" name="purchase_price" value="{{ $part->purchase_price ?? ''}}">
    <input type="number" name="sell_price" value="{{ $part->sell_price ?? ''}}">
    <select name="user_id">
        @foreach ($parts as $part_option)
            <option value="{{ $part_option->id }}">{{ $part_option->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>