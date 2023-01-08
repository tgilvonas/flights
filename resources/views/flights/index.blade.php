@extends('layouts.app')

@section('content')
<div>
    <div class="mb-3">
        <a href="{{ route('flights.create') }}" class="btn btn-success">
            {{ __('general.create_flight') }}
        </a>
    </div>
    @if(session()->get('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    @if(count($flights))
        <table class="table table-bordered table-with-bordered-cells">
            <thead>
                <tr>
                    <th>{{ __('general.flight_code') }}</th>
                    <th>{{ __('general.airport_from') }}</th>
                    <th>{{ __('general.departure_time') }}</th>
                    <th>{{ __('general.airport_to') }}</th>
                    <th>{{ __('general.arrival_time') }}</th>
                    <th>{{ __('general.status') }}</th>
                    <th>{{ __('general.passengers') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>
                            {{ $flight->code }}
                        </td>
                        <td>
                            {{ $flight->airportFrom->name ?? '' }}
                        </td>
                        <td>
                            <div>{{ $flight->departure_time->format('Y-m-d H:i') }}</div>
                            <div>{{ $flight->departureTimezone->name2 ?? '' }}</div>
                        </td>
                        <td>
                            {{ $flight->airportTo->name ?? '' }}
                        </td>
                        <td>
                            <div>{{ $flight->arrival_time->format('Y-m-d H:i') }}</div>
                            <div>{{ $flight->arrivalTimezone->name2 ?? '' }}</div>
                        </td>
                        <td>
                            {{ $flight->status->name ?? '' }}
                        </td>
                        <td>
                            {{ $flight->passengers }}
                        </td>
                        <td>
                            <a href="{{ route('flights.edit', ['flight' => $flight]) }}" class="btn btn-primary">
                                {{ __('general.edit') }}
                            </a>
                            <button class="btn btn-danger js-delete-flight" data-flight-id="{{ $flight->id }}" data-confirmation-text="{{ __('general.are_you_sure_you_want_to_delete_this_flight') }}">
                                {{ __('general.delete') }}
                            </button>
                            <form method="post" action="{{ route('flights.destroy', ['flight' => $flight]) }}" data-flight-id="{{ $flight->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginator">
            {!! $flights->links() !!}
        </div>
    @else
        <div>{{ __('general.there_are_no_records') }}</div>
    @endif
</div>
@endsection
