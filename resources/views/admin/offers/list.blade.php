@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">Árajánlatok</h2>
        <div class="d-flex justify-content-between py-4">
            <input type="text" class="filter-input form-control col-2" placeholder="Szűrés" data-target="#offers-table" data-items="tbody tr">
            <button id="new-offer-button" class="btn btn-secondary">Új árajánlat</button>
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
                        <td>{{ $offer->vehicle?->manufacturer }} {{ $offer->vehicle?->type }}</td>
                        <td>{{ $offer->vehicle?->license_plate }}</td>
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

<div id="new-offer-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Új árajánlat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/admin/offers/new">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="user_id">Árajánlat kiállítása az alábbi személy részére:</label>
                <select class="form-control mt-3 mb-4" name="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Létrehozás</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégsem</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection