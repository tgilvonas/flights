@extends('layouts.app')

@section('content')
    <h2>{{ __('general.edit_flight') }}</h2>
    <form method="post" action="{{ route('flights.update', ['flight' => $flight->id]) }}">
        @method('put')
        @include('flights.partials.flight-form-fields')
    </form>
@endsection
