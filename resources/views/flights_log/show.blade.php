@extends('layouts.app')

@section('content')
    <div>
        <table class="table table-bordered table-with-bordered-cells">
            <tbody>
            <tr>
                <td>
                    {{ __('general.flight_code') }}
                </td>
                <td>
                    {{ $log->subject->code ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ __('general.user') }}
                </td>
                <td>
                    {{ $log->causer->name ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ __('general.event') }}
                </td>
                <td>
                    {{ $log->event }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ __('general.datetime') }}
                </td>
                <td>
                    {{ $log->created_at->format('Y-m-d H:i:s') }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ __('general.fields') }}
                </td>
                <td>
                    <code id="changed_data">
                        {{ $log->properties }}
                    </code>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="">
            <a href="{{ route('flights_log.index') }}" class="btn btn-warning">
                {{ __('general.back') }}
            </a>
        </div>
    </div>
@endsection
