@extends('layouts.app')

@section('content')
<div>
    <div class="mb-3">
        <a href="{{ route('flights.create') }}" class="btn btn-success">
            {{ __('general.create_flight') }}
        </a>
    </div>
    @if($flights)
        <table class="table table-bordered table-with-bordered-cells">
            <thead>
                <tr>
                    <th>{{ __('general.airport_from') }}</th>
                    <th>{{ __('general.departure_time') }}</th>
                    <th>{{ __('general.airport_to') }}</th>
                    <th>{{ __('general.arrival_time') }}</th>
                    <th>{{ __('general.passengers') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
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
                            {{ $flight->passengers }}
                        </td>
                        <td>
                            <a href="{{ route('flights.edit', ['flight' => $flight]) }}" class="btn btn-primary">{{ __('general.edit') }}</a>
                            <a href="" class="btn btn-danger">{{ __('general.delete') }}</a>
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
