@extends('layouts.app')

@section('content')
    <h2>{{ __('general.flights_log') }}</h2>
    @if(count($logs))
        <table class="table table-bordered table-with-bordered-cells">
            <thead>
            <tr>
                <th>{{ __('general.flight_code') }}</th>
                <th>{{ __('general.user') }}</th>
                <th>{{ __('general.event') }}</th>
                <th>{{ __('general.datetime') }}</th>
                <th>{{ __('general.view') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>
                        {{ $log->subject->code ?? json_decode($log->properties)->old->code ?? '' }}
                    </td>
                    <td>
                        {{ $log->causer->name ?? '' }}
                    </td>
                    <td>
                        <span class="badge {{ $log->event }} opacity-75">
                            {{ ucfirst($log->event) }}
                        </span>
                    </td>
                    <td>
                        {{ $log->created_at->format('Y-m-d H:i:s') }}
                    </td>
                    <td>
                        <a href="{{ route('flights_log.show', ['id' => $log->id]) }}" class="btn btn-primary">
                            {{ __('general.view') }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginator">
            {!! $logs->links() !!}
        </div>
    @else
        <div>{{ __('general.there_are_no_records') }}</div>
    @endif
@endsection
