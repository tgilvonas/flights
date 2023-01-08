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
    @include('flights.partials.flights-list')
</div>
@endsection
