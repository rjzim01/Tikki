@extends('base.base')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sits</h1>
</div>
<hr>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h5 class="mb-0 text-gray-800">A - Available || B - Book</h5>
</div>
<hr>
<div class="row">
    @foreach ($sits as $sit)
    <div class="col-xl-1 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100  ">
            <div class="card-body">
                @auth
                    <a href="{{ route('sits.update', ['sit' => $sit->sit_number, 'trip' => $sit->trip_id]) }}" class="text-decoration-none text-reset">
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none text-reset">
                @endauth
                {{-- <a href="{{ route('sits.update', ['sit' => $sit->sit_number]) }}" class="text-decoration-none text-reset"> --}}
                    <div class="row no-gutters align-items-center">
                        <div>
                            {{ $sit->sit_number }}
                            <br>
                            {{ $sit->sit_status }}
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- <div class="row">
    <div class="col-md-6">
        @foreach ($sits as $sits)
        <div class="col-xl-1 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <a href=" {{ route('home') }} " class="text-decoration-none text-reset">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                {{ $sits->sit_number }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-6">
    </div>
</div> --}}

{{-- <div class="row">
    <div class="col-md-6">
        <!-- First half of the screen for the cards -->
        @foreach ($sits as $sit)
        <div class="card border-left-primary shadow h-100 py-2 mb-4">
            <div class="card-body">
                <a href="{{ route('home') }}" class="text-decoration-none text-reset">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            {{ $sit->sit_number }}
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-6">
        <!-- Second half of the screen for another task -->
        <!-- Your content for the other task goes here -->
    </div>
</div> --}}


@endsection