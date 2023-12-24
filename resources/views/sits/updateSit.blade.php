@extends('base.base')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Book Sit</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
</div>

<p>Sit No. {{$sit->sit_number}}</p>

<form method="POST" action="{{ route('sits.updateStore', ['sit' => $sit->sit_number, 'trip' => $sit->trip_id]) }}">
    @csrf
    <input type="hidden" name="sit_number" placeholder="Product Name" value="{{$sit->sit_number}}" readonly>
    {{-- <input type="text" name="sit_status" placeholder="Product Name" value="{{$sit->sit_status}}"> --}}
    <br>
    <button type="submit">Book Sit</button>
</form>

@endsection