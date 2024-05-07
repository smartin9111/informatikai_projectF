<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkatrészek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Alkatrészek</h2>
        <button class="btn btn-secondary" onclick="window.location.href='/admin/parts/editParts/'">Új alkatrész</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Gyártó</th>
                    <th>Típus</th>
                    <th>Szállítási idő</th>
                    <th>Vásárlási ár</th>
                    <th>Eladási ár</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parts as $part)
                    <tr>
                        <td>{{ $part->name }}</td>
                        <td>{{ $part->manufacturer }}</td>
                        <td>{{ $part->type }}</td>
                        <td>{{ $part->delivery_time }}</td>
                        <td>{{ $part->purchase_price }}</td>
                        <td>{{ $part->sell_price }}</td>
                        <td>
                        <button class="btn btn-secondary" onclick="window.location.href='/admin/parts/editParts/{{ $part->id }}'">Szerkesztés</button>
                        <button class="btn btn-secondary" onclick="window.location.href='/admin/parts/deleteParts/{{ $part->id }}'">Törlés</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>