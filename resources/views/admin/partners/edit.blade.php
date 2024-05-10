@extends('frontend.frontend_dashboard')
@section('main')
<section style="margin-top: 130px;">
    <div class="container mt-8">
        <h2 class="text-center mt-8">{{ $partner?->id ? "#$partner->id jármű szerkesztése" : 'Új jármű'}}</h2>
        <form class="my-5" method="post" action="/admin/partners/edit/{{ $partner->id ?? ''}}">
            @csrf
            <div class="form-group">
                <label for="name">Név</label>
                <input type="text" class="form-control" name="name" value="{{ $partner->name ?? ''}}">
            </div>
            <div class="form-group">
                <label for="username">Felhasználónév</label>
                <input type="text" class="form-control" name="username" value="{{ $partner->username ?? ''}}">
            </div>
            <div class="form-group">
                <label for="email">Email cím</label>
                <input type="text" class="form-control" name="email" value="{{ $partner->email ?? ''}}">
            </div>
            <div class="form-group">
                <label for="phone">Telefonszám</label>
                <input type="text" class="form-control" name="phone" value="{{ $partner->phone ?? ''}}">
            </div>
            <div class="form-group">
                <label for="address">Cím</label>
                <input type="text" class="form-control" name="address" value="{{ $partner->address ?? ''}}">
            </div>
            <div class="form-group">
                <label for="password">Új jelszó</label>
                <input type="text" class="form-control" name="password" value="">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Mentés</button>
        </form>
    </div>
</section>
@endsection

