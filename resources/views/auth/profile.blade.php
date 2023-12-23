@extends('base.base')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->phone }}</p>

<h2>Booked Tickets</h2>
@if ($user->bookTickets->isNotEmpty())
    <ul>
        @foreach ($user->bookTickets as $ticket)
            <li>
                {{-- Ticket ID: {{ $ticket->id }} - Trip ID: {{ $ticket->trip_id }} - Sit ID: {{ $ticket->sit_id }} --}}
                Sit NO: {{ $ticket->sit_id }} ||
                <!-- Access trip information -->
                @if ($ticket->trip)
                    Trip Name: {{ $ticket->trip->from }} - {{ $ticket->trip->to }} ||
                    Departure: {{ \Carbon\Carbon::parse($ticket->trip->departure)->format('h:i A,  d-F-Y') }}
                    <!-- Display other trip information as needed -->
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No booked tickets found.</p>
@endif


@endsection
