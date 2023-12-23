@extends('base.base')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Login</h1>
</div>

<form class="" method="POST" action="{{ route('login.validate') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" placeholder="Enter your phone number">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="....">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>

</form>

<a href="{{ route('register') }}" class="text-decoration-none text-reset" style="margin: 2px">Not Register?</a>

@endsection
