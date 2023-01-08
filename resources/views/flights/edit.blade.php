@extends('layouts.app')

@section('content')
    <h2>{{ __('general.edit_flight') }}</h2>
    <form method="post">
        @method('patch')
        @include('flights.flight-form-fields')
    </form>
@endsection
