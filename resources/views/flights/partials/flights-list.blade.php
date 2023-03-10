<div class="">
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
                        {{ $flight->airportFrom->name ?? '' }}, {{ $flight->airportFrom->country ?? '' }}
                    </td>
                    <td>
                        <div>{{ $flight->departure_time->format('Y-m-d H:i') }}</div>
                        <div>{{ $flight->departureTimezone->name2 ?? '' }}</div>
                        @if(isset($flight->additionalTimezone))
                            <hr/>
                            <div>
                                {{ $flight->additionalDepartureTime->format('Y-m-d H:i') }}
                            </div>
                            <div>
                                {{ $flight->additionalTimezone->name2 ?? '' }}
                            </div>
                        @endif
                    </td>
                    <td>
                        {{ $flight->airportTo->name ?? '' }}, {{ $flight->airportTo->country ?? '' }}
                    </td>
                    <td>
                        <div>{{ $flight->arrival_time->format('Y-m-d H:i') }}</div>
                        <div>{{ $flight->arrivalTimezone->name2 ?? '' }}</div>
                        @if(isset($flight->additionalTimezone))
                            <hr/>
                            <div>
                                {{ $flight->additionalArrivalTime->format('Y-m-d H:i') }}
                            </div>
                            <div>
                                {{ $flight->additionalTimezone->name2 ?? '' }}
                            </div>
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ strtolower($flight->status->name ?? '') }} opacity-75">
                            {{ $flight->status->name ?? '' }}
                        </span>
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
