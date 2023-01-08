@extends('layouts.app')

@section('content')
    <h2>{{ __('general.create_flight') }}</h2>
    <form method="post" action="{{ route('flights.store') }}">
        @include('flights.partials.flight-form-fields')
    </form>
@endsection
