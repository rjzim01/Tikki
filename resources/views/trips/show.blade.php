@extends('base.base')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    @foreach ($trips as $trip)
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <a href=" {{ route('sits') }} " class="text-decoration-none text-reset">
                    <div class="row no-gutters align-items-center">
                        <div class="col col-auto">
                            <div class="text-xss font-weight-bold text-primary text-uppercase mb-1">
                                {{ $trip->from }} - {{ $trip->to }}
                            </div>
                            <div class="text-xs mb-1">
                                Departure - {{ \Carbon\Carbon::parse($trip->departure)->format('h:i A,  d-F-Y') }}
                                <!-- Countdown timer element -->
                                {{-- <span id="countdown-{{ $trip->id }}"></span> --}}
                            </div>
                            <div class="text-xs mb-1">
                                Arival - {{ \Carbon\Carbon::parse($trip->arrival)->format('h:i A,  d-F-Y') }}
                            </div>
                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$</div> --}}
                        </div>
                        {{-- <div class="col-auto"> --}}
                        <div class="col pl-3" >
                            {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                            <span id="countdown-{{ $trip->id }}"></span>
                            <p style="font-size: .5rem">Time left - Book your ticket now</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endforeach

</div>

<script>
    // Check if $trips is not empty and it is an array
    @if ($trips && $trip->count() > 0)
        @foreach ($trips as $trip)
            var departureTime{{ $trip->id }} = new Date('{{ $trip->departure }}').getTime();
    
            var countdownElement{{ $trip->id }} = document.getElementById('countdown-{{ $trip->id }}');
    
            var countdown{{ $trip->id }} = setInterval(function() {
                var now = new Date().getTime();
                var distance = departureTime{{ $trip->id }} - now;
    
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
                countdownElement{{ $trip->id }}.innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";
    
                if (distance < 0) {
                    clearInterval(countdown{{ $trip->id }});
                    countdownElement{{ $trip->id }}.innerHTML = "Trip has started!";
                }
            }, 1000);
        @endforeach
    @endif
</script>

@endsection