@extends('base.base')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Make a Trip</h1>
</div>

<form class="" method="POST" action="{{ route('trip.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">From</label>
        <input type="text" name="from" class="form-control" placeholder="Departure City">
    </div>
    <div class="mb-3">
        <label class="form-label">To</label>
        <input type="text" name="to" class="form-control" placeholder="Destination City">
    </div>
    <div class="mb-3">
        <label class="form-label">Departure</label>
        <input type="datetime-local" name="departure" class="form-control" placeholder="3 december">
    </div>
    <div class="mb-3">
        <label class="form-label">Arival</label>
        <input type="datetime-local" name="arrival" class="form-control" placeholder="Destination Time">
    </div>

    <button type="submit" class="btn btn-primary">Confirm Trip</button>

</form>

@endsection
