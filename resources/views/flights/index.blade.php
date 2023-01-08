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
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label col-sm-12">{{ __('general.timezone') }}</label>
        <div class="col-md-10 col-sm-12">
            <select name="timezone" id="selected_timezone" class="form-control">
                <option value="">{{ __('general.local_timezones') }}</option>
                @foreach($timezones as $timezone)
                    <option value="{{ $timezone->id }}">
                        {{ $timezone->name2 }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
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
                            <a href="{{ route('flights.edit', ['flight' => $flight]) }}" class="btn btn-primary mb-1">
                                {{ __('general.edit') }}
                            </a>
                            <button class="btn btn-danger js-delete-flight mb-1" data-flight-id="{{ $flight->id }}" data-confirmation-text="{{ __('general.are_you_sure_you_want_to_delete_this_flight') }}">
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
