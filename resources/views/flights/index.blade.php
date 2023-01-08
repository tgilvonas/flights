@extends('layouts.app')

@section('content')
<div>
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
                        </td>
                        <td>
                            {{ $flight->airportTo->name ?? '' }}
                        </td>
                        <td>
                            <div>{{ $flight->arrival_time->format('Y-m-d H:i') }}</div>
                        </td>
                        <td>
                            {{ $flight->passengers }}
                        </td>
                        <td>

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
